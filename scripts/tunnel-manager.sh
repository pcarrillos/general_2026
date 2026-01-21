#!/bin/bash

# Script para gestionar túneles de Cloudflare desde el host
# Este script se ejecuta en el host (no en el contenedor) mediante cron

DB_HOST="127.0.0.1"
DB_PORT="3307"
DB_NAME="general"
DB_USER="general"
DB_PASS="SecureMySQLPass2024"
LOG_DIR="/var/log/cloudflare-tunnels"
TUNNEL_LOG_DIR="/tmp/cf-tunnels"

# Crear directorios si no existen
mkdir -p "$LOG_DIR"
mkdir -p "$TUNNEL_LOG_DIR"

log() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1" >> "$LOG_DIR/tunnel-manager.log"
}

mysql_query() {
    mysql -h "$DB_HOST" -P "$DB_PORT" -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" -N -e "$1" 2>/dev/null
}

mysql_exec() {
    mysql -h "$DB_HOST" -P "$DB_PORT" -u "$DB_USER" -p"$DB_PASS" "$DB_NAME" -e "$1" 2>/dev/null
}

create_tunnel() {
    local user_id=$1
    local log_file="$TUNNEL_LOG_DIR/tunnel_user_${user_id}.log"

    log "Creando túnel para usuario ID: $user_id"

    # Iniciar el túnel en segundo plano
    cloudflared tunnel --url https://localhost:443 \
        --http-host-header general.pwm435.space \
        --origin-server-name general.pwm435.space \
        --no-tls-verify > "$log_file" 2>&1 &

    local pid=$!

    # Esperar a que se genere la URL
    local attempts=0
    local max_attempts=30
    local domain=""

    while [ $attempts -lt $max_attempts ] && [ -z "$domain" ]; do
        sleep 1
        attempts=$((attempts + 1))

        if [ -f "$log_file" ]; then
            domain=$(grep -oE 'https://[a-z0-9-]+\.trycloudflare\.com' "$log_file" | head -1 | sed 's|https://||')
        fi
    done

    if [ -z "$domain" ]; then
        log "ERROR: No se pudo obtener el dominio para usuario $user_id"
        kill $pid 2>/dev/null
        mysql_exec "UPDATE usuarios SET tunnel_status = 'failed' WHERE id = $user_id"
        return 1
    fi

    log "Túnel creado exitosamente para usuario $user_id: $domain (PID: $pid)"

    # Actualizar la base de datos
    mysql_exec "UPDATE usuarios SET dominio = '$domain', tunnel_pid = $pid, tunnel_status = 'active' WHERE id = $user_id"

    return 0
}

destroy_tunnel() {
    local user_id=$1
    local pid=$2

    log "Destruyendo túnel para usuario ID: $user_id (PID: $pid)"

    if [ -n "$pid" ] && [ "$pid" -gt 0 ]; then
        if ps -p "$pid" > /dev/null 2>&1; then
            kill "$pid" 2>/dev/null
            sleep 1
            if ps -p "$pid" > /dev/null 2>&1; then
                kill -9 "$pid" 2>/dev/null
            fi
        fi
    fi

    # Limpiar archivo de log
    rm -f "$TUNNEL_LOG_DIR/tunnel_user_${user_id}.log"

    log "Túnel destruido para usuario $user_id"
}

restart_tunnel() {
    local user_id=$1
    local old_pid=$2

    log "Reiniciando túnel para usuario ID: $user_id"

    destroy_tunnel "$user_id" "$old_pid"
    create_tunnel "$user_id"
}

# Verificar túneles activos que ya no están corriendo
check_active_tunnels() {
    log "Verificando túneles activos..."

    while IFS=$'\t' read -r id pid; do
        if [ -n "$pid" ] && [ "$pid" -gt 0 ]; then
            if ! ps -p "$pid" > /dev/null 2>&1; then
                log "Túnel del usuario $id (PID: $pid) no está corriendo, reiniciando..."
                mysql_exec "UPDATE usuarios SET tunnel_status = 'pending' WHERE id = $id"
            fi
        fi
    done < <(mysql_query "SELECT id, tunnel_pid FROM usuarios WHERE tunnel_status = 'active' AND tunnel_pid IS NOT NULL")
}

# Procesar usuarios pendientes
process_pending() {
    log "Procesando usuarios pendientes..."

    while IFS=$'\t' read -r id; do
        create_tunnel "$id"
    done < <(mysql_query "SELECT id FROM usuarios WHERE tunnel_status = 'pending'")
}

# Procesar usuarios marcados para eliminación de túnel
process_delete_requests() {
    log "Procesando solicitudes de eliminación..."

    while IFS=$'\t' read -r id pid; do
        destroy_tunnel "$id" "$pid"
        mysql_exec "UPDATE usuarios SET tunnel_pid = NULL, dominio = NULL, tunnel_status = 'deleted' WHERE id = $id"
    done < <(mysql_query "SELECT id, tunnel_pid FROM usuarios WHERE tunnel_status = 'delete'")
}

# Main
log "=== Iniciando gestión de túneles ==="

check_active_tunnels
process_delete_requests
process_pending

log "=== Gestión de túneles completada ==="
