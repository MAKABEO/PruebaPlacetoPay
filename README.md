<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<img src="https://app.codeship.com/projects/c4a49330-63f1-0138-ec9d-4608fa381da8/status?branch=master" />
</p>

## Sobre el proyecto

Este proyecto fue realizado utilizando el framework laravel para backend junto con los templates VegieFood y 
colorlib-regform-7 para la interfaz grafica; tambien hace uso de la api web checkout de Place to Pay y las api de free 
currency conversion para el cambio de divisa.

Este proyecto fue realizado apoyandose en un proceso de CD/CI utilizando CodeShip y Heroku para verlo en funcionamiento 
desde heroku vistar el link:

- http://pruebaplacetopay.herokuapp.com/shop

Nota: En algunos navegadores como Firefox se hace necesario deshabilitar la proteccion de conexion segura para poder ver
apropiadamente la pagina.

En la carpeta resources/develop se encuentra el diagrama de entidad relacion utilizada para el desarrollo de las bases de datos,
el cual fue realizado con visual paradigm comunity edition.

## Instalacion del proyecto

Para la instalacion del proyecto se hace necesario descargar el repositorio desde github con el comando:

- git clone https://github.com/MAKABEO/PruebaPlacetoPay.git

Copiar el archivo .env.example y reemplazar el nombre para que se llame .env

Posteriormente instalar las dependecias de laravel con composer y generar la llave de aplicacion

- composer install
-php artisan key:generate

Luego rellenar las variables de entorno CURRENCY_CONVERSION_API_KEY, PLACE_TO_PAY_LOGIN, PLACE_TO_PAY_TRANKEY en archivo 
.env con las respectivas llaves para que de este modo se pueda acceder a las diferentes APIs

Despues se inician las migraciones de las bases de datos junto con los seeders para crear las bases de datos y los datos de prueba
con el comando:

- php artisan migrate:fresh --seed --force

Y por ultimo se instala y compilan las despendencias de la interfazgrafica con:

- npm install
- npm run dev
