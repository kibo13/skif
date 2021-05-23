# Laravel Application

> Laravel application for creating and controlling orders of a furniture company

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

# email configuration
MAIL_MAILER=smtp
MAIL_HOST=smtp.email_service
MAIL_PORT=465
MAIL_USERNAME=email_username
MAIL_PASSWORD=email_password
MAIL_ENCRYPTION=ssl

# run application
php artisan serve

# list of users
custom/users.txt
```
