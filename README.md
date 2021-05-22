# Laravel Application

> Laravel application for the dispatcher of the emergency department of a housing enterprise

## Quick Start

```bash
# download or clone repository
git clone https://github.com/kibo13/skif.git

# install dependencies
composer install
npm install (npm i)

# copy file .env
copy .env.example .env

# generate a key
php artisan key:generate

# create a new mysql database via phpmyadmin or GUI

# import to created database file
custom/database.sql

# database configuration
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_username
DB_PASSWORD=database_password

# run application
php artisan serve

# list of users
custom/users.txt
```
