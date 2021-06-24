<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Instalación

- Requiere PHP 7.2
- Composer
- NodeJS

- Clonar el proyecto
    ~~~
    git clone https://github.com/alejocarvajal/tienda-reactjs.git tienda-reactjs
    ~~~
- Acceder a la carpeta tienda-reactjs
    ~~~
    cd tienda-reactjs
    ~~~
- Instalar dependencias composer
    ~~~
    composer install
    ~~~
- Instalar dependencias npm
    ~~~
    npm install
    npm run dev
    ~~~
- Crear el archivo .env con el contenido
    ~~~
    APP_NAME=Tienda-ReactJS
    APP_ENV=local
    APP_KEY=base64:UNxY4+L/TzZHx45NL2l+o7I990LnYfnmQGAHWDtX9ZI=
    APP_DEBUG=true
    APP_URL=http://localhost

    LOG_CHANNEL=stack

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120

    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=null
    MAIL_FROM_NAME="${APP_NAME}"

    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=

    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_APP_CLUSTER=mt1

    MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
    MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
    ~~~
- Generar la llave de la aplicacion a través de un terminal

    ~~~
    php artisan key:generate
    ~~~
## Ejecución
- A través del terminal se ejecuta el comando:

    - php artisan serve

 - Una vez ejecutado, ingresar a http://localhost:8000

## Datos de prueba

- Usuario:

    - email: test@test.com
    - password: 12345

- Pedido de consulta:
    - 12345 / Aprobado
    - 54321 / Rechazado

## Funcionamiento
- Al registrar un nuevo usuario, automaticamente queda logueado.
- Solo permite añadir metodo de pago a los clientes registrados.
- Cuando se accede al carrito de compra:
    - Si el cliente es Invitado, debe diligenciar el formulario de metodos de pago
    - Si el cliente esta logueado, aparece diligenciado el formulario de metodo de pago
 - Nota: Debido a que la aplicacion no tiene persistencia de datos, todo se manejó a través de la variable de SESSION, asumiento que es un protipo de prueba, por tal razon los datos de prueba para la consulta estan quemados, aunque la logica de los metodos permite agregar los modelos o llamados a APIS