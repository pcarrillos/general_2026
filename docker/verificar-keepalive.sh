#!/bin/bash

echo ""
echo "=========================================="
echo "  VERIFICACIÓN KEEP-ALIVE RENDER PROXY"
echo "=========================================="
echo ""

# Colores
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Verificar URLs configuradas
echo -e "${BLUE}1. Verificando configuración...${NC}"
PROXY_URLS=$(grep "RENDER_PROXY_URLS=" .env 2>/dev/null | cut -d'=' -f2)

if [ -z "$PROXY_URLS" ]; then
    echo -e "   ${RED}✗ RENDER_PROXY_URLS no configurada${NC}"
    echo ""
    echo -e "${YELLOW}   Edita el archivo .env y configura:${NC}"
    echo -e "   RENDER_PROXY_URLS=https://proxy1.onrender.com,https://proxy2.onrender.com"
    echo ""
    exit 1
elif [[ "$PROXY_URLS" == *"proxy1.onrender.com"* ]] || [[ "$PROXY_URLS" == *"tu-proxy"* ]]; then
    echo -e "   ${YELLOW}⚠ RENDER_PROXY_URLS usa URLs de ejemplo${NC}"
    echo -e "   ${YELLOW}   Por favor configura las URLs reales de tus proxies${NC}"
    # Contar proxies
    PROXY_COUNT=$(echo "$PROXY_URLS" | tr ',' '\n' | wc -l)
    echo -e "   ${YELLOW}   Proxies configurados (ejemplo): $PROXY_COUNT${NC}"
else
    # Contar proxies
    PROXY_COUNT=$(echo "$PROXY_URLS" | tr ',' '\n' | wc -l)
    echo -e "   ${GREEN}✓ URLs configuradas: $PROXY_COUNT proxy/proxies${NC}"
    # Mostrar primera URL como ejemplo
    FIRST_URL=$(echo "$PROXY_URLS" | cut -d',' -f1)
    echo -e "   ${GREEN}   Ejemplo: $FIRST_URL${NC}"
fi

echo ""

# Verificar tarea programada
echo -e "${BLUE}2. Verificando tarea programada...${NC}"
php artisan schedule:list 2>/dev/null | grep -q "keep-render-proxy-alive"

if [ $? -eq 0 ]; then
    echo -e "   ${GREEN}✓ Tarea programada encontrada${NC}"
    NEXT_RUN=$(php artisan schedule:list 2>/dev/null | grep "keep-render-proxy-alive" | grep -oP 'Next Due: \K.*')
    echo -e "   ${GREEN}   Próxima ejecución: $NEXT_RUN${NC}"
else
    echo -e "   ${RED}✗ Tarea programada NO encontrada${NC}"
fi

echo ""

# Verificar cron
echo -e "${BLUE}3. Verificando servicio cron...${NC}"
if service cron status >/dev/null 2>&1; then
    echo -e "   ${GREEN}✓ Cron está corriendo${NC}"
else
    echo -e "   ${RED}✗ Cron NO está corriendo${NC}"
fi

echo ""

# Probar ping manual
echo -e "${BLUE}4. Probando ping manual al proxy...${NC}"
php artisan render:ping

echo ""
echo "=========================================="
echo ""

# Instrucciones finales
if [[ "$PROXY_URLS" == *"proxy1.onrender.com"* ]] || [[ "$PROXY_URLS" == *"tu-proxy"* ]]; then
    echo -e "${YELLOW}⚠️  ACCIÓN REQUERIDA:${NC}"
    echo ""
    echo "1. Edita /srv/zcentral/.env línea 73"
    echo "2. Configura: RENDER_PROXY_URLS=https://proxy-real-1.onrender.com,https://proxy-real-2.onrender.com"
    echo "3. Ejecuta: docker exec zcentral_app php artisan config:clear"
    echo ""
    echo -e "${BLUE}Formato:${NC} URLs separadas por coma, sin espacios"
    echo ""
else
    echo -e "${GREEN}✅ El sistema está configurado correctamente${NC}"
    echo ""
    echo "Los pings se enviarán a $PROXY_COUNT proxy/proxies cada 2 minutos."
    echo ""
    echo -e "${BLUE}Para monitorear en tiempo real:${NC}"
    echo "  tail -f /var/www/html/storage/logs/laravel.log | grep 'Ping exitoso'"
    echo ""
fi

echo "=========================================="
echo ""
