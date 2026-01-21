#!/bin/bash

# Script para hacer backup de la base de datos MySQL
# Uso: ./scripts/db-backup.sh

BACKUP_DIR="/srv/general/database/backups"
TIMESTAMP=$(date +"%Y%m%d_%H%M%S")
BACKUP_FILE="$BACKUP_DIR/backup_$TIMESTAMP.sql"
LATEST_FILE="$BACKUP_DIR/latest.sql"

# Crear directorio si no existe
mkdir -p "$BACKUP_DIR"

echo "Creando backup de la base de datos..."

# Hacer dump de la base de datos
docker exec general_mysql mysqldump -u general -pSecureMySQLPass2024 general > "$BACKUP_FILE"

if [ $? -eq 0 ]; then
    # Crear copia como latest.sql
    cp "$BACKUP_FILE" "$LATEST_FILE"

    echo "Backup creado exitosamente:"
    echo "  - $BACKUP_FILE"
    echo "  - $LATEST_FILE"

    # Mostrar tamaño
    ls -lh "$BACKUP_FILE" | awk '{print "  Tamaño: " $5}'

    # Mantener solo los últimos 5 backups (además de latest.sql)
    cd "$BACKUP_DIR"
    ls -t backup_*.sql | tail -n +6 | xargs -r rm --
    echo "Backups antiguos limpiados (se mantienen los últimos 5)"
else
    echo "Error al crear el backup"
    exit 1
fi
