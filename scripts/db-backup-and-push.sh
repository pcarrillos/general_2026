#!/bin/bash

# Script para hacer backup de la base de datos y subirlo al repo
# Ejecutado automáticamente por cron

BACKUP_DIR="/srv/general/database/backups"
PROJECT_DIR="/srv/general"
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
BACKUP_FILE="$BACKUP_DIR/backup_$TIMESTAMP.sql"
LATEST_FILE="$BACKUP_DIR/latest.sql"
LOG_FILE="/var/log/db-backup.log"

log() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1" >> "$LOG_FILE"
}

log "=== Iniciando backup automático ==="

# Crear directorio si no existe
mkdir -p "$BACKUP_DIR"

# Hacer dump de la base de datos
docker exec general_mysql mysqldump -u general -pSecureMySQLPass2024 general > "$BACKUP_FILE" 2>/dev/null

if [ $? -ne 0 ]; then
    log "ERROR: Falló el dump de la base de datos"
    exit 1
fi

log "Backup creado: $BACKUP_FILE"

# Crear copia como latest.sql
cp "$BACKUP_FILE" "$LATEST_FILE"

# Mantener solo los últimos 5 backups (además de latest.sql)
cd "$BACKUP_DIR"
ls -t backup_*.sql 2>/dev/null | tail -n +6 | xargs -r rm --

# Subir al repositorio
cd "$PROJECT_DIR"

# Verificar si hay cambios
if git diff --quiet "$BACKUP_DIR" && git diff --cached --quiet "$BACKUP_DIR"; then
    log "No hay cambios en el backup, omitiendo commit"
    exit 0
fi

git add "$BACKUP_DIR"/*.sql

git commit -m "Backup automático de base de datos - $TIMESTAMP

Co-Authored-By: Claude Opus 4.5 <noreply@anthropic.com>"

if [ $? -eq 0 ]; then
    git push origin master
    if [ $? -eq 0 ]; then
        log "Backup subido al repositorio exitosamente"
    else
        log "ERROR: Falló el push al repositorio"
        exit 1
    fi
else
    log "ERROR: Falló el commit"
    exit 1
fi

log "=== Backup automático completado ==="
