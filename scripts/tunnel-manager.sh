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

# Configuración de Telegram
TELEGRAM_BOT_TOKEN="8589980485:AAECBSt3GICx0cVvWEqAQsYraY1r9M93jSc"

# Configuración de health check
HEALTH_CHECK_TIMEOUT=10  # Segundos de timeout para el health check
HEALTH_CHECK_PATH="/auth/login"  # Ruta para verificar (debe existir y responder)

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

# Función para verificar si un túnel está respondiendo
check_tunnel_health() {
    local domain=$1
    local url="https://${domain}${HEALTH_CHECK_PATH}"

    # Hacer petición HTTP con timeout
    local http_code=$(curl -sL -o /dev/null -w "%{http_code}" --max-time "$HEALTH_CHECK_TIMEOUT" "$url" 2>/dev/null)

    # Verificar si el código es válido (200-399)
    if [[ "$http_code" =~ ^[23][0-9][0-9]$ ]]; then
        return 0  # Túnel saludable
    else
        log "Health check fallido para $domain: HTTP $http_code"
        return 1  # Túnel no saludable
    fi
}

# Función para enviar mensaje de Telegram
send_telegram() {
    local chat_id=$1
    local message=$2

    curl -s -X POST "https://api.telegram.org/bot${TELEGRAM_BOT_TOKEN}/sendMessage" \
        -d "chat_id=${chat_id}" \
        -d "text=${message}" \
        -d "parse_mode=HTML" > /dev/null 2>&1

    if [ $? -eq 0 ]; then
        log "Telegram: Mensaje enviado a chat_id ${chat_id}"
    else
        log "Telegram: ERROR enviando mensaje a chat_id ${chat_id}"
    fi
}

# Función para notificar cambio de dominio a todos los chatids del usuario
notify_domain_change() {
    local user_id=$1
    local usuario=$2
    local old_domain=$3
    local new_domain=$4
    local chatids=$5
    local reason=$6

    if [ -z "$chatids" ]; then
        log "Usuario $user_id no tiene chatids configurados, no se envía notificación"
        return
    fi

    local message="<b>🔄 Cambio de Dominio</b>

<b>Usuario:</b> ${usuario}

<b>Motivo:</b> ${reason}

<b>Dominio anterior:</b>
<code>${old_domain}</code>

<b>Nuevo dominio:</b>
<code>${new_domain}</code>

<b>Nueva URL completa:</b>
https://${new_domain}

⚠️ Actualiza tus enlaces con el nuevo dominio."

    # Separar chatids por coma y enviar a cada uno
    IFS=',' read -ra CHAT_ARRAY <<< "$chatids"
    for chat_id in "${CHAT_ARRAY[@]}"; do
        # Eliminar espacios en blanco
        chat_id=$(echo "$chat_id" | tr -d ' ')
        if [ -n "$chat_id" ]; then
            send_telegram "$chat_id" "$message"
        fi
    done

    log "Notificación de cambio de dominio enviada para usuario $user_id a chatids: $chatids"
}

# Función para notificar nuevo túnel creado
notify_new_tunnel() {
    local user_id=$1
    local usuario=$2
    local domain=$3
    local chatids=$4

    if [ -z "$chatids" ]; then
        log "Usuario $user_id no tiene chatids configurados, no se envía notificación"
        return
    fi

    local message="<b>✅ Túnel Creado</b>

<b>Usuario:</b> ${usuario}

<b>Dominio asignado:</b>
<code>${domain}</code>

<b>URL completa:</b>
https://${domain}

El túnel está activo y listo para usar."

    # Separar chatids por coma y enviar a cada uno
    IFS=',' read -ra CHAT_ARRAY <<< "$chatids"
    for chat_id in "${CHAT_ARRAY[@]}"; do
        chat_id=$(echo "$chat_id" | tr -d ' ')
        if [ -n "$chat_id" ]; then
            send_telegram "$chat_id" "$message"
        fi
    done

    log "Notificación de nuevo túnel enviada para usuario $user_id a chatids: $chatids"
}

# Función para notificar túnel caído detectado
notify_tunnel_down() {
    local user_id=$1
    local usuario=$2
    local domain=$3
    local chatids=$4
    local reason=$5

    if [ -z "$chatids" ]; then
        return
    fi

    local message="<b>⚠️ Túnel Caído Detectado</b>

<b>Usuario:</b> ${usuario}

<b>Dominio afectado:</b>
<code>${domain}</code>

<b>Motivo:</b> ${reason}

🔄 Generando nuevo túnel automáticamente..."

    IFS=',' read -ra CHAT_ARRAY <<< "$chatids"
    for chat_id in "${CHAT_ARRAY[@]}"; do
        chat_id=$(echo "$chat_id" | tr -d ' ')
        if [ -n "$chat_id" ]; then
            send_telegram "$chat_id" "$message"
        fi
    done

    log "Notificación de túnel caído enviada para usuario $user_id"
}

create_tunnel() {
    local user_id=$1
    local old_domain=$2  # Dominio anterior (vacío si es nuevo)
    local reason=$3      # Razón del cambio (vacío si es nuevo)
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

    # Obtener información del usuario para notificación
    local user_info=$(mysql_query "SELECT usuario, chatids FROM usuarios WHERE id = $user_id")
    local usuario=$(echo "$user_info" | cut -f1)
    local chatids=$(echo "$user_info" | cut -f2)

    # Actualizar la base de datos
    mysql_exec "UPDATE usuarios SET dominio = '$domain', tunnel_pid = $pid, tunnel_status = 'active' WHERE id = $user_id"

    # Esperar un momento para que el túnel se estabilice
    sleep 3

    # Verificar que el nuevo túnel funcione
    if check_tunnel_health "$domain"; then
        log "Nuevo túnel verificado y funcionando: $domain"
    else
        log "ADVERTENCIA: Nuevo túnel creado pero health check falló: $domain"
    fi

    # Enviar notificación según el caso
    if [ -n "$old_domain" ] && [ "$old_domain" != "$domain" ]; then
        # El dominio cambió
        local notify_reason="${reason:-Reinicio del túnel}"
        notify_domain_change "$user_id" "$usuario" "$old_domain" "$domain" "$chatids" "$notify_reason"
    elif [ -z "$old_domain" ]; then
        # Es un túnel nuevo
        notify_new_tunnel "$user_id" "$usuario" "$domain" "$chatids"
    fi

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
    local old_domain=$3
    local reason=$4

    log "Reiniciando túnel para usuario ID: $user_id (dominio anterior: $old_domain, razón: $reason)"

    destroy_tunnel "$user_id" "$old_pid"
    create_tunnel "$user_id" "$old_domain" "$reason"
}

# Verificar túneles activos - proceso y health check HTTP
check_active_tunnels() {
    log "Verificando túneles activos..."

    while IFS=$'\t' read -r id pid domain usuario chatids; do
        local needs_restart=false
        local restart_reason=""

        # Verificar si el proceso está corriendo
        if [ -n "$pid" ] && [ "$pid" -gt 0 ]; then
            if ! ps -p "$pid" > /dev/null 2>&1; then
                log "Túnel del usuario $id (PID: $pid) - proceso no encontrado"
                needs_restart=true
                restart_reason="Proceso del túnel no encontrado"
            fi
        else
            log "Túnel del usuario $id no tiene PID válido"
            needs_restart=true
            restart_reason="PID no válido"
        fi

        # Si el proceso está corriendo, verificar health check HTTP
        if [ "$needs_restart" = false ] && [ -n "$domain" ]; then
            log "Verificando health check para usuario $id: $domain"
            if ! check_tunnel_health "$domain"; then
                log "Health check fallido para usuario $id: $domain"
                needs_restart=true
                restart_reason="Túnel no responde (posible baneo o error)"

                # Notificar que se detectó túnel caído
                notify_tunnel_down "$id" "$usuario" "$domain" "$chatids" "$restart_reason"
            else
                log "Health check OK para usuario $id: $domain"
            fi
        fi

        # Reiniciar si es necesario
        if [ "$needs_restart" = true ]; then
            log "Reiniciando túnel para usuario $id - Razón: $restart_reason"
            restart_tunnel "$id" "$pid" "$domain" "$restart_reason"
        fi

    done < <(mysql_query "SELECT id, tunnel_pid, dominio, usuario, chatids FROM usuarios WHERE tunnel_status = 'active' AND tunnel_pid IS NOT NULL")
}

# Procesar usuarios pendientes
process_pending() {
    log "Procesando usuarios pendientes..."

    while IFS=$'\t' read -r id; do
        create_tunnel "$id" "" ""
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
