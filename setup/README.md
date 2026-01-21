# Instalación en Nueva VPS

## Requisitos
- Ubuntu 20.04+ o Debian 11+
- Acceso root
- Mínimo 2GB RAM, 20GB disco

## Instalación Rápida

```bash
# Como root
git clone https://github.com/pcarrillos/general_2026.git /srv/general
cd /srv/general
./setup/install.sh
```

## Instalación Manual

### 1. Instalar Docker
```bash
curl -fsSL https://get.docker.com | bash
systemctl enable docker && systemctl start docker
```

### 2. Instalar Docker Compose
```bash
curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose
```

### 3. Instalar cloudflared
```bash
curl -L --output cloudflared.deb https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64.deb
dpkg -i cloudflared.deb
```

### 4. Clonar repositorio
```bash
git clone https://github.com/pcarrillos/general_2026.git /srv/general
cd /srv/general
```

### 5. Configurar nginx-proxy
```bash
docker volume create srv_certs
docker volume create srv_vhost
docker volume create srv_html
docker volume create srv_dhparam
docker volume create srv_acme
docker network create nginx-proxy

cp -r setup/nginx-proxy /srv/nginx-proxy
cd /srv/nginx-proxy && docker-compose up -d
```

### 6. Iniciar aplicación
```bash
cd /srv/general
docker-compose build
docker-compose up -d
```

### 7. Restaurar base de datos
```bash
# Esperar 10 segundos a que MySQL inicie
sleep 10
docker exec -i general_mysql mysql -u general -pSecureMySQLPass2024 general < database/backups/latest.sql
```

### 8. Configurar permisos
```bash
docker exec general_app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
docker exec general_app php artisan optimize:clear
```

### 9. Configurar cron jobs
```bash
(crontab -l 2>/dev/null; echo "* * * * * /srv/general/scripts/tunnel-manager.sh >> /var/log/cloudflare-tunnels/cron.log 2>&1"; echo "0 */6 * * * /srv/general/scripts/db-backup-and-push.sh") | crontab -

mkdir -p /var/log/cloudflare-tunnels
chmod +x /srv/general/scripts/*.sh
cp /srv/general/scripts/tunnel-manager.sh /usr/local/bin/
```

## Verificación

```bash
# Ver contenedores
docker ps

# Ver logs
docker logs -f general_app

# Probar aplicación
curl -I https://general.pwm435.space
```

## Comandos Útiles

```bash
# Backup manual de BD
./scripts/db-backup.sh

# Restaurar BD
./scripts/db-restore.sh

# Reiniciar aplicación
docker-compose restart

# Ver túneles activos
cat /var/log/cloudflare-tunnels/tunnel-manager.log | tail -50
```
