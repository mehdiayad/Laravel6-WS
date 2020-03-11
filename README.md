<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## About the project

- Reproduce Amazon website as a training (Back End Side)
- RESTFUL API Architecture
- Communicate with the frontend


## Project Version

- Version : 1.0.0-SNAPSHOT


## Project requirements

- Server : MAMP / WAMP / XAMPP
- Browser : Chrome / Mozilla

## Project components version

- Laravel 6.0
- PHP : 7.2

## Project concepts used
- Authentification
- Eloquent ORM
- Query Builder
- Migrations
- Seeding
- Middleware
- Dependency Injection
- Hashing
- Pagination
- Relationship

## Project setup (Create Database)

- install MAMP
- Open MAMP application
- Go to webstart page -> tools -> phpMyAdmin
- create a database name 'laravel'

## Project setup (Create Project)

- download the project from github
- Come back to MAMP/WAMP webstart page, you should see all MySQL informations connections 
- update project/.env databases informations with MySQL informations connections  (Default & Additionnal)
- update project/config/database.php databases informations with MySQL informations connections (Default & Additionnal)
- Open the terminal from your project root folder
- Run the command php artisan migrate:install
- Run the command php artisan migrate:refresh --seed
- Run the command php artisan serve
- Open your browser and go to the page http://localhost:8000/
- You can connect to the app with (email:super@gmail.com / password:super)



