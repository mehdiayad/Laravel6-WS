<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## About the project

- Reproduce Amazon website as a training (Back End Side)
- RESTFUL API Architecture
- Communicate with the frontend


## Project requirements

- Browser : Chrome / Mozilla
- Composer
- Nginx server
- MySQL server
- PHP


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


## 1A) Download LARAVEL project (Mac)

- Go to https://github.com/mehdiayad/Laravel-WS and download the project
- Put the project in your web Directory (/Users/<user>/web/)

## 1B) Download LARAVEL project (Windows)

- Go to https://github.com/mehdiayad/Laravel-WS and download the project
- Put the project in your web Directory (C:/env/web/)

## 2A) Setup Composer (Mac)

- Follow instructions on (https://getcomposer.org/download/)
- Then install it globally (https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)
- Open terminal and run composer --version to verify


## 2B) Setup Composer (Windows)

- Go to (https://getcomposer.org/doc/00-intro.md#installation-windows)
- Doanload the .exe file
- Installer composer for all users
- Open terminal and run composer --version to verify


## 3A) Setup PHP (Mac)

- TO DO

## 3B) Setup PHP (Windows)

- Go to officel php download page (https://windows.php.net/download/)
- Download the thread safe 7.3 version
- Add php folder in your path
- Open the terminal and run "php -v"
- If you see php informations package, installation is completed
- if you have an error with a dll
- install Microsoft Vicual Studio Redistribuable package 
- (https://support.microsoft.com/fr-fr/help/2977003/the-latest-supported-visual-c-downloads)

## 4A) Setup NGINX server (Mac)

- Install brew install nginx (brew install nginx)
- Open terminal go to the folder /Users/<user>/Sites
- Type ls- l to display all users/groups who have access to this folder (you should see your username associated to staff group)
- Open the conf file (/usr/local/etc/nginx/nginx.conf)
- On the first line add user <username> staff; replace it with your name
- Another option is to not use a specific user (by commenting the line with #) and give a read access only to user 'everyone' with option apply to all inclusive folder
- Set listen to 8090
- Set server_name to localhost
- Set root to your project public directory (ex : /Users/<user>/Sites/Laravel-WS/public/)
- Open your php-fm config file (usr/local/etc/php/7.2/php-fpm.d/www.conf)
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
	
## 4B) Setup NGINX server (Windows)
- Download Nginx stable version (http://nginx.org/en/download.html)
- nginx/Windows-1.18.0
- Unzip in your env folder (c:/env)
- Change the conf file folder by this (https://github.com/mehdiayad/Laravel-WS/blob/master/docs/nginx/nginx-windows.conf)
- Create a start batch file in Nginx folder like this (https://github.com/mehdiayad/Laravel-WS/blob/master/docs/nginx/start.bat)
- Create a stop batch file in Nginx folder like this (https://github.com/mehdiayad/Laravel-WS/blob/master/docs/nginx/stop.bat)


## 5A) Setup MYSQL database (Mac)

- Install mysql from official website (https://dev.mysql.com/downloads/mysql/)
- Choose mac platform
- Go through the guide install and choose a password for your user ex: user (root) password(root)
- once installation finished open the terminal and enter mysql -u root -p
- Enter the password
- you should see 'Welcome to the MySQL monitor'
- if you use Mysql8 type ALTER USER root@localhost identified with mysql_native_password by 'root'; for make it compatible with laravel
- enter CREATE DATABASE laravel;
- enter SHOW DATABASES; and verify if laravel is in the result
- Download mysqlworkbench from official website
- Launch the instal then from the dashboard connect the the instance with 3306 port
- clic on server status then memorize the setup (host/port/socket)
- update project/.env databases informations with MySQL informations connections
- update project/config/database.php databases informations with MySQL informations connections
- Mysql is ready to use

## 5B) Setup MYSQL database (Windows)

- Mysql need Visual Studio as python as post-installation
- Install visual studio entreprise edition (https://visualstudio.microsoft.com/fr/vs/) 
- During installation, add the package (web developpement and ASP.net)
- Install python Windows x86-64 MSI installer (https://www.python.org/downloads/windows/)
- Install mysql from official website (https://dev.mysql.com/downloads/mysql/)
- Choose windows platform
- Go through the guide install and choose a password for your user ex: user (root) password(root)
- once installation finished open the terminal and enter mysql -u root -p
- Enter the password
- you should see 'Welcome to the MySQL monitor'
- if you use Mysql8 type ALTER USER root@localhost identified with mysql_native_password by 'root'; for make it compatible with laravel
- enter CREATE DATABASE laravel;
- enter SHOW DATABASES; and verify if laravel is in the result
- Download mysqlworkbench from official website
- Launch the instal then from the dashboard connect the the instance with 3306 port
- clic on server status then memorize the setup (host/port/socket)
- update project/.env databases informations with MySQL informations connections
- update project/config/database.php databases informations with MySQL informations connections
- Mysql is ready to use

## 6A) Setup npm (Mac)

- Open the terminal and go to your project directory
- Run the command [npm install]
- Run the command [npm run dev]



## 6B) Setup npm (Windows)

- Open the terminal and go to your project directory
- Run the command [npm install]
- Run the command [npm run dev]


## 7) Setup LARAVEL project (Mac/Windows)

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

- Refer to http://localhost:8090/api/documentation for more informations (NGINX)
- Generate model from database php artisan krlove:generate:model User --table-name=users
- Generate documentation php artisan l5-swagger:generate for generate documentation
- Annotations : https://quickadminpanel.com/blog/laravel-api-documentation-with-openapiswagger/


## WARNING

- Because the laravel build-in server in singlethread, if you run this application with php artisan serve, the front API won't be able to connect through this API. You must use a multi-thread server (APACHE or NGINX)


