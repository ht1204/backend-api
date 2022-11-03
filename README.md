# BOOKS API
Laravel Backend Api for Book Management

[Go to frontend NextJS client](https://github.com/ht1204/frontend-client)

## Instructions
- Install PHP and [Laravel Valet](https://laravel.com/docs/9.x/valet) in your computer.
- Install mysql, create database for books and create a correspondent table.
- Clone this repo through command `git clone https://github.com/ht1204/backend-api.git`.
- Once the project is cloned, copy the file env setup `.env.example`, paste it in same root project directory and rename it as `.env`.
- Change the database credentials for connection, check env variables which start with `DB_` and change values as you configured the local database.

## Running Up
Once you are located in local project path:
- Check http requests routes: `php artisan route:list`
- Run the server: `php artisan serve`
- Run unit tests for CRUD Operations: `php artisan test`

Mentorship by [https://aprendible.com/](https://aprendible.com/)
