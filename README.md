# Instruction

### Make command in console:
>git clone https://github.com/alexgo93/lara_task.git

### Install dependencies(using makefile)
>make install

### Build docker containers
> docker-compose up -d --build

### Copy .env.example file like that
> cp .env.example .env

### Create database for project from db container
> docker-compose exec db bash  
>mysql -u root -p  
>create database {YOUR_DATABASE_NAME};  
>exit  

### Write connection options to your db in .env file like that

DB_CONNECTION=mysql  
DB_HOST=db  
DB_PORT=3306  
DB_DATABASE={YOUR_DATABASE_NAME}  
DB_USERNAME={YOUR_DATABASE_USER}  
DB_PASSWORD={YOUR_DATABASE_PASSWORD}  

### Go inside app container

> docker-compose exec app bash

### Inside app-container bash generate key for your app

> make key

### Use migrations

> make migrate

### Clear cache

> make clear

## Console comand for user creating

> php artisan user:create name email password

NOTICE:  
 -password must be at least 8 characters  
 -email must be valid

Go to http://localhost in your browser and have fun=)
 
 \*\* God bless \*\*  
