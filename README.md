# QrMsPdfUpload


### Before Installation in your machine.
    Make sure you have Imagemagick installed <https://mlocati.github.io/articles/php-windows-imagick.html>

### Installation

    git clone https://github.com/khobbie/QrMsPdfUpload.git qr-ms
    cd qr-ms
    composer install

Rename the `env.example` to `env`

MySQL : Create database  `provest_qr`

Run the sql query located in `/MYSQL_DUMP_BACKUP/provest_qr.sql`

In the terminal `/qr-ms`

    php artisan serve

Application runs on : <http://127.0.0.1:8000/>

## Starting your containers
    docker-compose up

### Run the following commands in your console/terminal —

    docker-compose exec app php artisan key:generate
    docker-compose exec app php artisan optimize

## Time to check out your application!
#

### Application — <http://localhost> 

### PhpMyAdmin — <http://localhost:8888> 

### Mailhog — <http://localhost:8025>
Above reference from: <https://medium.com/@chewysalmon/laravel-docker-development-setup-an-updated-guide-72842dfe8bdf>

****


https://user-images.githubusercontent.com/22434053/159277407-d1df3afa-f26d-49f0-922e-6f4e4dbfce9e.mp4



https://user-images.githubusercontent.com/22434053/159286250-84a7163c-d17c-41a2-ad76-a289b948f212.mp4

