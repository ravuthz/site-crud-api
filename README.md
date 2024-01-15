# Site CRUD API

```bash

git clone https://github.com/ravuthz/site-crud-api.git

cd site-crud-api

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve

php artisan passport:install

```

```bash
# For development for only, it will ease all previous data
php artisan migrate:fresh --seed
```

## API Documentation

After started the server

-   Go to / to see the server laravel is started

    -   Ex: http://localhost:8000

-   Go to /api to see the api routes started

    -   Ex: http://localhost:8000/api

-   Go to /api-docs to see the api documentation
    -   Ex: http://localhost:8000/api-docs

[Development NOTE](./DEV.md)
