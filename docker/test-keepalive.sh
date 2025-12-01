#!/bin/bash

echo "======================================"
echo "TEST DE CONFIGURACIÓN KEEP-ALIVE"
echo "======================================"
echo ""

# Colores para output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Test 1: Verificar variable de entorno
echo -n "1. Verificando RENDER_PROXY_URL... "
if [ -z "$RENDER_PROXY_URL" ]; then
    echo -e "${RED}FALLO${NC}"
    echo "   RENDER_PROXY_URL no está configurado en .env"
else
    echo -e "${GREEN}OK${NC}"
    echo "   URL configurada: $RENDER_PROXY_URL"
fi
echo ""

# Test 2: Verificar que cron está instalado
echo -n "2. Verificando instalación de cron... "
if command -v cron &> /dev/null; then
    echo -e "${GREEN}OK${NC}"
else
    echo -e "${RED}FALLO${NC}"
    echo "   cron no está instalado"
fi
echo ""

# Test 3: Verificar que cron está corriendo
echo -n "3. Verificando servicio cron... "
if pgrep cron > /dev/null; then
    echo -e "${GREEN}OK${NC}"
else
    echo -e "${YELLOW}ADVERTENCIA${NC}"
    echo "   cron no está corriendo. Intenta: service cron start"
fi
echo ""

# Test 4: Verificar crontab
echo -n "4. Verificando crontab de Laravel... "
if crontab -l | grep -q "schedule:run"; then
    echo -e "${GREEN}OK${NC}"
    echo "   Crontab configurado correctamente"
else
    echo -e "${RED}FALLO${NC}"
    echo "   Crontab no configurado para Laravel scheduler"
fi
echo ""

# Test 5: Verificar conectividad
if [ ! -z "$RENDER_PROXY_URL" ]; then
    echo -n "5. Probando conectividad al proxy... "
    response=$(curl -s -o /dev/null -w "%{http_code}" --max-time 10 "$RENDER_PROXY_URL" 2>/dev/null)

    if [ $? -eq 0 ]; then
        echo -e "${GREEN}OK${NC}"
        echo "   HTTP Status: $response"
    else
        echo -e "${RED}FALLO${NC}"
        echo "   No se pudo conectar al proxy"
    fi
    echo ""
fi

# Test 6: Verificar archivo Kernel.php
echo -n "6. Verificando app/Console/Kernel.php... "
if [ -f "/var/www/html/app/Console/Kernel.php" ]; then
    if grep -q "keep-render-proxy-alive" "/var/www/html/app/Console/Kernel.php"; then
        echo -e "${GREEN}OK${NC}"
        echo "   Tarea programada encontrada"
    else
        echo -e "${YELLOW}ADVERTENCIA${NC}"
        echo "   Archivo existe pero no contiene la tarea keep-render-proxy-alive"
    fi
else
    echo -e "${RED}FALLO${NC}"
    echo "   app/Console/Kernel.php no existe"
fi
echo ""

# Test 7: Verificar que Laravel puede ejecutar comandos
echo -n "7. Verificando Laravel artisan... "
if php /var/www/html/artisan --version > /dev/null 2>&1; then
    echo -e "${GREEN}OK${NC}"
else
    echo -e "${RED}FALLO${NC}"
    echo "   No se puede ejecutar artisan"
fi
echo ""

# Test 8: Ver tareas programadas
echo "8. Listado de tareas programadas:"
php /var/www/html/artisan schedule:list 2>/dev/null | grep -A 2 "keep-render-proxy-alive" || echo "   No se pudo obtener el listado"
echo ""

echo "======================================"
echo "RESUMEN"
echo "======================================"
echo "Si todos los tests pasaron (OK/VERDE), el keep-alive"
echo "debería estar funcionando correctamente."
echo ""
echo "Para monitorear los logs:"
echo "  tail -f /var/www/html/storage/logs/laravel.log | grep 'Ping exitoso'"
echo ""
