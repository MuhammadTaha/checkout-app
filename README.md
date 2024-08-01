
## Checkout algo

This project is build on Laravel 10 with Postgres DB. The application can be setup using following docker compose command 

`docker compose up --build` which is made up of two container. One for the app and the other is for Postgres.

While starting the project with docker, migration files are run to setup the Item and ItemOffers table and other default tables. These tables are filled with using laravel seeding feature. 

The application can be tested by running the tests with command `php artisan test`. 

