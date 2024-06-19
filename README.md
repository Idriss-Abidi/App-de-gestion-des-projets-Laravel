# Laravel Project Management Application

## Introduction

This is a project management application built with Laravel.


## Video Demonstration

Here is a video demonstration of the project: [Video Demonstration](Video Demonstration.mp4)


## Installation

### Verify the PHP Installation

Ensure PHP is properly installed and working:

1. Open your terminal or command prompt.
2. Run the following command:
  ```sh
  php -v
  ``` 
   
If PHP is installed, this will display the PHP version.

### Installation

Ensure you have all necessary Laravel dependencies:

1. Clone this repository (inside the htdocs folder if you're using xampp):
  ``` bash
  git clone https://github.com/Idriss-Abidi/App-de-gestion-des-projets-Laravel.git
  ```

2. Navigate to your project directory:
  ``` bash
  cd App-de-gestion-des-projets-Laravel
  ```

3. Install Composer dependencies:
  ``` bash
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
Create the database manually using the [database.sql](database.sql) file provided.
  ``` bash
  database.sql
  ```

4. Run the Laravel Development Server
To run the Laravel development server, use:

  ``` sh
  php artisan serve
  ```
Ensure your vendor folder and all required packages are installed. If the vendor folder is missing the necessary files, you might need to run composer install again.
