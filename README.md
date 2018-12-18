# eventfull
Para correr el proyecto:

1- Clonar el repositorio
2- Tener instalado Postgresql,PHP >= 7.0,Composer
3- Crear un archivo en el Root del proyecto con el nombre ".env", alli se guardan las variables de entorno, dependiendo del sistema que utilizaremos, aqui abajo un ejemplo:

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:53VCIvukAd5JSyCL56KLwjb5+ozHdsRgpPPBE5MUM7I=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=eventfull
DB_USERNAME=postgres
DB_PASSWORD=postgres

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

4-) Abrir una terminal, ir al Root del proyecto y correr "php artisan migrate" y luego "php artisan db:seed", el primero comando crea las tablas necesarias para los modelos y el segundo precarga algunas tablas con ciertos datos de inicializacion
5-) Correr "php artisan serve", Esto correra un servidor web temporal localmente con el proyecto
6-) Ir a la url del proyecto + /api-tester Ej: http://127.0.0.1:8000/api-tester , desde alli se podran testear las rutas
