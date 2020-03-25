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
- Passport : 8.4
- FruitCake : 1.0


## Project concepts used
- Laravel Authentification 
- Passport Authentification
- Eloquent ORM
- Query Builder
- Migrations
- Seeding
- Middleware
- Dependency Injection
- Hashing
- Pagination
- Relationship
- Cors Policy

## Project setup (Create Database)

- install MAMP
- Open MAMP application
- you should see MAMP home page on http://localhost:8888/
- Go to webstart page -> tools -> phpMyAdmin
- create a database name 'laravel'



## Project setup (Create Project)

- Go to MAMP preferences and set up your web server document root
- (MAMP -> preferences -> Web Server -> Document Root -> Select (Desktop/Web for example)
- download the project from github
- Place the project inside your MAMP Web Server  root folder (Desktop/Web)
- Come back to MAMP/WAMP webstart page, you should see all MySQL informations connections 
- update project/.env databases informations with MySQL informations connections
- update project/config/database.php databases informations with MySQL informations connections
- Delete the folder vendor if exist
- Delete the folder node_modules if exist
- Open the terminal and go to your project directory
- Run the command [npm install]
- Run the command [npm run dev]
- Run the command [composer update]
- Run the command [php artisan migrate:install]
- Run the command [php artisan migrate]
- Run the command [php artisan passport:install]
- Run the command [php artisan db:seed]
- Go to the database (http://localhost:8888/phpMyAdmin/index.php)
- Go to the table oauth_clients
- Copy the secret of the Laravel Password Grant Client
- Paste the secret of the env.file of the project (PASSPORT_CLIENT_SECRET=XXXX)
- Come back to http://localhost:8888/Laravel-WS/public/
- You should see the login page authentification
- You can connect to the app with (email:super@gmail.com / password:super)
- Create a new Client and give a random name
- You should see a client id associated to the random name you've just given
- The setup is now completed


## WARNING

- Because the laravel build-in server in singlethread, if you run this application with php artisan serve, the front API won't be able to connect through this API. You must use a multi-thread server (APACHE or NGINX). This is why we use MAMP server on the project setup with apache built-in server


