#!/bin/bash

# URL del proxy de Render (configurable desde variable de entorno)
PROXY_URL="${RENDER_PROXY_URL:-https://tu-proxy.onrender.com}"
INTERVAL=120  # 2 minutos en segundos

echo "Iniciando keep-alive para $PROXY_URL cada $INTERVAL segundos..."

while true; do
    # Hacer petición al proxy
    response=$(curl -s -o /dev/null -w "%{http_code}" --max-time 5 "$PROXY_URL" 2>/dev/null)

    if [ $? -eq 0 ]; then
        echo "[$(date '+%Y-%m-%d %H:%M:%S')] Ping exitoso al proxy - HTTP $response"
    else
        echo "[$(date '+%Y-%m-%d %H:%M:%S')] Error al contactar el proxy"
    fi

    # Esperar 2 minutos
    sleep $INTERVAL
done
