# ZCentral - Aplicación Laravel

Aplicación Laravel configurada para desarrollo con Docker, accesible desde https://central.pwm435.space/

## Requisitos previos

- Docker y Docker Compose instalados
- Red nginx-proxy configurada
- DNS configurado en Cloudflare apuntando a este servidor

## Instalación inicial

### 1. Instalar Laravel

```bash
# Instalar Laravel usando Composer
docker run --rm -v $(pwd):/app composer create-project laravel/laravel .

# O si ya tienes la red nginx-proxy configurada
composer create-project laravel/laravel .
```

### 2. Configurar variables de entorno

```bash
cp .env.example .env
```

Edita el archivo `.env` si necesitas cambiar alguna configuración.

### 3. Construir y levantar los contenedores

```bash
docker-compose up -d --build
```

### 4. Instalar dependencias y configurar Laravel

```bash
# Entrar al contenedor
docker exec -it zcentral_app bash

# Dentro del contenedor:
composer install
php artisan key:generate
php artisan migrate
php artisan storage:link

# Establecer permisos
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
```

## Desarrollo

### Estructura de volúmenes

El directorio actual está montado en `/var/www/html` dentro del contenedor, por lo que cualquier cambio que hagas en tu código se reflejará inmediatamente en la aplicación.

### Comandos útiles

```bash
# Ver logs de todos los servicios
docker-compose logs -f

# Ver logs solo de la aplicación
docker-compose logs -f app

# Entrar al contenedor de la aplicación
docker exec -it zcentral_app bash

# Ejecutar comandos artisan
docker exec -it zcentral_app php artisan [comando]

# Ejecutar Composer
docker exec -it zcentral_app composer [comando]

# Ejecutar migraciones
docker exec -it zcentral_app php artisan migrate

# Limpiar caché
docker exec -it zcentral_app php artisan cache:clear
docker exec -it zcentral_app php artisan config:clear
docker exec -it zcentral_app php artisan route:clear
docker exec -it zcentral_app php artisan view:clear

# Acceder a MySQL
docker exec -it zcentral_db mysql -u zcentral -psecret zcentral

# Acceder a Redis CLI
docker exec -it zcentral_redis redis-cli
```

### MailHog (Pruebas de correo)

MailHog captura todos los correos enviados por la aplicación. Accede a la interfaz web en:
- http://localhost:8025

### Servicios incluidos

- **app**: Aplicación Laravel (PHP 8.2 + Nginx)
- **db**: MySQL 8.0
- **redis**: Redis 7
- **mailhog**: Capturador de correos para desarrollo

### Puertos expuestos localmente

- MySQL: 3306
- Redis: 6379
- MailHog SMTP: 1025
- MailHog Web: 8025

## Acceso a la aplicación

La aplicación estará disponible en:
- https://central.pwm435.space/

## Detener y reiniciar

```bash
# Detener los contenedores
docker-compose down

# Detener y eliminar volúmenes (¡cuidado, elimina la base de datos!)
docker-compose down -v

# Reiniciar servicios
docker-compose restart

# Reconstruir contenedores
docker-compose up -d --build
```

## Solución de problemas

### Permisos

Si encuentras problemas de permisos:

```bash
docker exec -it zcentral_app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
```

### La aplicación no es accesible

1. Verifica que nginx-proxy esté corriendo
2. Verifica que la red nginx-proxy exista: `docker network ls`
3. Revisa los logs: `docker-compose logs -f app`

### Cambios no se reflejan

Los cambios en código PHP se reflejan inmediatamente. Si usas Vite para assets:

```bash
# Dentro del contenedor o localmente
npm install
npm run dev
```

## Base de datos

### Credenciales por defecto

- **Host**: db (desde la aplicación) o localhost:3306 (desde tu máquina)
- **Database**: zcentral
- **Username**: zcentral
- **Password**: secret
- **Root Password**: root_secret

### Backup

```bash
docker exec zcentral_db mysqldump -u root -proot_secret zcentral > backup.sql
```

### Restore

```bash
docker exec -i zcentral_db mysql -u root -proot_secret zcentral < backup.sql
```
