<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## About the project

- Reproduce Amazon website as a training (Back End Side)
- RESTFUL API Architecture
- Communicate with the frontend


## Project Version

- Version : 1.0.0-SNAPSHOT


## Project requirements

- Apache Server
- Browser : Chrome / Mozilla


## Project components version

- Laravel 6.0
- PHP : 7.2
- Passport : 8.4
- FruitCake : 1.0
- Swagger : 6.0
- Eloquent Model Generator : 1.3

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


## 1) Setup project 1/2 (LARAVEL)

- Go to https://github.com/mehdiayad/Laravel-WS and download the project
- Put the project in your Sites Directory (/Users/<user>/Sites/)

## 2A) Setup server (NGINX) Mac version

- Install brew install nginx (brew install nginx)
- Open the conf file (/usr/local/etc/nginx/nginx.conf)
- On the first line add user <username> staff; replace it with your name
- Set listen to 8090
- Set server_name to localhost
- Set root to your project public directory (ex : /Users/<user>/Sites/Laravel-WS/public/)
- Open your php-fm.conf (usr/local/etc/php/7.2/php-fpm.d/www.conf)
- Find the line Listen (ex: listen = 127.0.0.1:9000) The address on which to accept FastCGI requests 
- Come back to your nginx conf file
- Set the fastcgi value to the listen value (ex : 127.0.0.1:9000)
- Start nginx (sudo nginx) or stop nginx (sudo nginx -s stop) then start again
- Go to localhost:8090
- if you see the login page, the setup is now completed
- For more informations see the nginx conf in the docs folder 
- Commands to remember
	- sudo nginx (start by default)
	- sudo nginx -s stop
	- sudo nginx -s reload


## 2B) Setup server (APACHE) Mac version

- Install brew install apache (brew install httpd)
- Open the conf file (/usr/local/etc/httpd/httpd.conf)
- Find the line with Listen and change port to 8070
- Find the bloc <IfModule mime_module> and add inside AddType application/x-httpd-php .php
- Set the line with User to your User
- Set the line with group to staff
- Set the line with ServerName to localhost
- Uncomment the line with LoadModule rewrite_module lib/httpd/modules/mod_rewrite.so (add it if not exist)
- Uncomment the line with LoadModule php7_module /usr/libexec/apache2/libphp7.so (add it if not exist)
- Find the line with <Directory /> and set AllowOverride to All
- Find the line with <Directory /> and set Require to all granted
- Find the line with DocumentRoot and set your laravel public directory path
- Just below set the Directory path to your laravel public directory path also
- Find the line <IfModule dir_module> and add index.php
- Go to localhost:8070
- if you see the login page, the setup is now completed
- For more informations see the apache conf in the docs folder 
- Commands to remember
	- sudo apachectl start
	- sudo apachectl stop
	- sudo apachectl restart

## 3) Setup database (MYSQL) Mac version

- Install mysql from official website (https://dev.mysql.com/downloads/mysql/)
- Go through the guide install and choose a password for your user ex: user (root) password(root1234)
- once installation finished open the terminal and enter mysql -u root -p
- Enter the password
- you should see 'Welcome to the MySQL monitor'
- if you use Mysql8 type ALTER USER root@localhost identified with mysql_native_password by 'root1234'; for make it compatible with laravel
- enter CREATE DATABASE laravel;
- enter SHOW DATABASES; and verify if laravel is in the result
- Download mysqlworkbench from official website
- Launch the instal then from the dashboard connect the the instance with 3306 port
- clic on server status then memorize the setup (host/port/socket)
- update project/.env databases informations with MySQL informations connections
- update project/config/database.php databases informations with MySQL informations connections
- Mysql is ready to use

## 4) Setup project 2/2 (LARAVEL)

- Open the terminal and go to your project directory
- Run the command [npm install]
- Run the command [npm run dev]
- Run the command [composer update]
- Run the command [php artisan migrate:install]
- Run the command [php artisan migrate]
- Run the command [php artisan passport:install]
- Run the command [php artisan telescope:install]
- Run the command [php artisan db:seed]
- Open Mysql Workbench and go to the table oauth_clients
- Copy the secret of the Laravel Password Grant Client
- Paste the secret of the env.file of the project (PASSPORT_CLIENT_SECRET=XXXX)
- You should see the login page authentification
- You can connect to the app with (email:super@gmail.com / password:super)
- The setup is now completed



## DOCUMENTATION

- Run php artisan l5-swagger:generate for generate documentation
- Refer to http://localhost:8070/api/documentation for more informations (APACHE)
- Refer to http://localhost:8090/api/documentation for more informations (NGINX)


## WARNING

- Because the laravel build-in server in singlethread, if you run this application with php artisan serve, the front API won't be able to connect through this API. You must use a multi-thread server (APACHE or NGINX)


