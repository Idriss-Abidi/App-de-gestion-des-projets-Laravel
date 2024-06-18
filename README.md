# Laravel Project Management Application

## Introduction

This is a project management application built with Laravel.

## Installation

### Verify the PHP Installation

Ensure PHP is properly installed and working:

1. Open your terminal or command prompt.
2. Run the following command:
  ```sh
  php -v
  ``` 
   
If PHP is installed, this will display the PHP version.

### Check Laravel Project Setup

Ensure you have all necessary Laravel dependencies:

1. Navigate to your project directory:
  ``` bash
  cd C:\xampp\htdocs\App-de-gestion-des-projets-Laravel
  ```

3. Install Composer dependencies:

  ``` sh
  composer install
  ```

3. Ensure Database Configuration
Ensure your .env file has the correct database configuration:

  ```sh
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3307
  DB_DATABASE=your_database_name
  DB_USERNAME=your_database_username
  DB_PASSWORD=your_database_password
  ```
Create the database manually using the database.sql file provided.

4. Run the Laravel Development Server
To run the Laravel development server, use:

  ``` sh
  php artisan serve
  ```
Ensure your vendor folder and all required packages are installed. If the vendor folder is missing the necessary files, you might need to run composer install again.
