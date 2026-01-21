#!/bin/bash

# =============================================================================
# Script de instalación completo para General 2026
# Uso: curl -sSL <url> | bash  o  ./setup/install.sh
# =============================================================================

set -e

# Colores
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

log() { echo -e "${GREEN}[INFO]${NC} $1"; }
warn() { echo -e "${YELLOW}[WARN]${NC} $1"; }
error() { echo -e "${RED}[ERROR]${NC} $1"; exit 1; }

# Variables
REPO_URL="https://github.com/pcarrillos/general_2026.git"
PROJECT_DIR="/srv/general"
NGINX_PROXY_DIR="/srv/nginx-proxy"

echo "=============================================="
echo "  Instalación de General 2026"
echo "=============================================="
echo ""

# Verificar que se ejecuta como root
if [ "$EUID" -ne 0 ]; then
    error "Este script debe ejecutarse como root"
fi

# =============================================================================
# 1. Instalar dependencias del sistema
# =============================================================================
log "Instalando dependencias del sistema..."

apt-get update
apt-get install -y \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg \
    lsb-release \
    git \
    jq

# =============================================================================
# 2. Instalar Docker
# =============================================================================
if ! command -v docker &> /dev/null; then
    log "Instalando Docker..."
    curl -fsSL https://get.docker.com | bash
    systemctl enable docker
    systemctl start docker
else
    log "Docker ya está instalado"
fi

# =============================================================================
# 3. Instalar Docker Compose
# =============================================================================
if ! command -v docker-compose &> /dev/null; then
    log "Instalando Docker Compose..."
    curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
    chmod +x /usr/local/bin/docker-compose
else
    log "Docker Compose ya está instalado"
fi

# =============================================================================
# 4. Instalar cloudflared
# =============================================================================
if ! command -v cloudflared &> /dev/null; then
    log "Instalando cloudflared..."
    curl -L --output cloudflared.deb https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64.deb
    dpkg -i cloudflared.deb
    rm cloudflared.deb
else
    log "cloudflared ya está instalado"
fi

# =============================================================================
# 5. Clonar repositorio
# =============================================================================
if [ -d "$PROJECT_DIR" ]; then
    warn "El directorio $PROJECT_DIR ya existe"
    read -p "¿Desea actualizarlo? (s/N): " update_repo
    if [ "$update_repo" = "s" ] || [ "$update_repo" = "S" ]; then
        cd "$PROJECT_DIR"
        git pull origin master
    fi
else
    log "Clonando repositorio..."
    git clone "$REPO_URL" "$PROJECT_DIR"
fi

cd "$PROJECT_DIR"

# =============================================================================
# 6. Configurar nginx-proxy
# =============================================================================
log "Configurando nginx-proxy..."

# Crear volúmenes externos
docker volume create srv_certs 2>/dev/null || true
docker volume create srv_vhost 2>/dev/null || true
docker volume create srv_html 2>/dev/null || true
docker volume create srv_dhparam 2>/dev/null || true
docker volume create srv_acme 2>/dev/null || true

# Crear red externa
docker network create nginx-proxy 2>/dev/null || true

# Copiar configuración de nginx-proxy
if [ ! -d "$NGINX_PROXY_DIR" ]; then
    mkdir -p "$NGINX_PROXY_DIR"
    cp -r "$PROJECT_DIR/setup/nginx-proxy/"* "$NGINX_PROXY_DIR/"
fi

# Iniciar nginx-proxy
cd "$NGINX_PROXY_DIR"
docker-compose up -d
cd "$PROJECT_DIR"

# =============================================================================
# 7. Construir e iniciar la aplicación
# =============================================================================
log "Construyendo e iniciando la aplicación..."

docker-compose build
docker-compose up -d

# Esperar a que MySQL esté listo
log "Esperando a que MySQL esté listo..."
sleep 10

# =============================================================================
# 8. Restaurar base de datos
# =============================================================================
if [ -f "$PROJECT_DIR/database/backups/latest.sql" ]; then
    log "Restaurando base de datos desde backup..."
    docker exec -i general_mysql mysql -u general -pSecureMySQLPass2024 general < "$PROJECT_DIR/database/backups/latest.sql" 2>/dev/null || true
else
    log "Ejecutando migraciones..."
    docker exec general_app php artisan migrate --force
fi

# =============================================================================
# 9. Configurar permisos de Laravel
# =============================================================================
log "Configurando permisos..."
docker exec general_app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
docker exec general_app chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# =============================================================================
# 10. Limpiar caché
# =============================================================================
log "Limpiando caché de Laravel..."
docker exec general_app php artisan optimize:clear

# =============================================================================
# 11. Configurar cron jobs
# =============================================================================
log "Configurando cron jobs..."

# Eliminar crons anteriores del proyecto y agregar nuevos
(crontab -l 2>/dev/null | grep -v "tunnel-manager\|db-backup-and-push"; \
echo "* * * * * /srv/general/scripts/tunnel-manager.sh >> /var/log/cloudflare-tunnels/cron.log 2>&1"; \
echo "0 */6 * * * /srv/general/scripts/db-backup-and-push.sh") | crontab -

# Crear directorios de logs
mkdir -p /var/log/cloudflare-tunnels

# Dar permisos de ejecución a scripts
chmod +x "$PROJECT_DIR/scripts/"*.sh

# =============================================================================
# 12. Copiar tunnel-manager al sistema
# =============================================================================
log "Configurando tunnel-manager..."
cp "$PROJECT_DIR/scripts/tunnel-manager.sh" /usr/local/bin/tunnel-manager.sh
chmod +x /usr/local/bin/tunnel-manager.sh

# =============================================================================
# Finalización
# =============================================================================
echo ""
echo "=============================================="
echo -e "${GREEN}  Instalación completada${NC}"
echo "=============================================="
echo ""
echo "Servicios instalados:"
echo "  - Docker y Docker Compose"
echo "  - cloudflared"
echo "  - nginx-proxy (SSL automático)"
echo "  - Aplicación Laravel"
echo "  - MySQL con persistencia"
echo ""
echo "Cron jobs configurados:"
echo "  - tunnel-manager.sh (cada minuto)"
echo "  - db-backup-and-push.sh (cada 6 horas)"
echo ""
echo "Próximos pasos:"
echo "  1. Verificar que los contenedores estén corriendo:"
echo "     docker ps"
echo ""
echo "  2. Acceder a la aplicación:"
echo "     https://general.pwm435.space"
echo ""
echo "  3. Ver logs:"
echo "     docker logs -f general_app"
echo ""
