#!/bin/bash

# Script para restaurar la base de datos MySQL desde un backup
# Uso: ./scripts/db-restore.sh [archivo.sql]
# Si no se especifica archivo, usa latest.sql

BACKUP_DIR="/srv/general/database/backups"
BACKUP_FILE="${1:-$BACKUP_DIR/latest.sql}"

if [ ! -f "$BACKUP_FILE" ]; then
    echo "Error: No se encontró el archivo de backup: $BACKUP_FILE"
    echo ""
    echo "Backups disponibles:"
    ls -lh "$BACKUP_DIR"/*.sql 2>/dev/null || echo "  No hay backups disponibles"
    exit 1
fi

echo "Restaurando base de datos desde: $BACKUP_FILE"
echo "ADVERTENCIA: Esto sobrescribirá todos los datos actuales."
read -p "¿Continuar? (s/N): " confirm

if [ "$confirm" != "s" ] && [ "$confirm" != "S" ]; then
    echo "Operación cancelada"
    exit 0
fi

# Restaurar la base de datos
docker exec -i general_mysql mysql -u general -pSecureMySQLPass2024 general < "$BACKUP_FILE"

if [ $? -eq 0 ]; then
    echo "Base de datos restaurada exitosamente"
else
    echo "Error al restaurar la base de datos"
    exit 1
fi
