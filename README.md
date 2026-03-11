# Task Management System (Laravel)

This project is a Task Management Web Application built using Laravel and MySQL as part of the Software Engineering Intern Technical Assessment.

The system allows users to register, log in, and manage their tasks efficiently. It includes full CRUD functionality, soft deletes, filtering, sorting, pagination, and a simple browser-based user interface.

------------------------------------------------------------

FEATURES

- User registration and login
- Secure authentication
- Create tasks
- View tasks
- Update tasks
- Delete tasks using soft deletes
- View deleted tasks
- Restore deleted tasks
- Permanently delete tasks
- Search tasks by title
- Filter tasks by status
- Sort tasks by due date
- Pagination for task lists
- Dashboard interface

------------------------------------------------------------

TECH STACK

- Laravel
- PHP
- MySQL
- Blade Templates
- Tailwind CSS
- Alpine.js
- SweetAlert2

------------------------------------------------------------

INSTALLATION & SETUP

Follow these steps to run the project locally.

1. Clone the repository

git clone <REPOSITORY_LINK>
cd task-manager

2. Install PHP dependencies

composer install

3. Install frontend dependencies

npm install

4. Create environment file

Copy the example environment file

cp .env.example .env

If using Windows, manually create .env and copy the contents of .env.example.

5. Generate application key

php artisan key:generate

6. Configure database

Update the .env file with your database details.

Example:

DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=task_manager  
DB_USERNAME=root  
DB_PASSWORD=

7. Run migrations

php artisan migrate

8. Build frontend assets

npm run build

9. Start the application

php artisan serve or
php -S 127.0.0.1:8000 -t public

Then open:

http://127.0.0.1:8000

------------------------------------------------------------

ENVIRONMENT VARIABLES

The project uses the following environment variables:

APP_NAME  
APP_ENV  
APP_KEY  
APP_DEBUG  
APP_URL  
DB_CONNECTION  
DB_HOST  
DB_PORT  
DB_DATABASE  
DB_USERNAME  
DB_PASSWORD  

An example configuration is provided in `.env.example`.

------------------------------------------------------------

ASSUMPTIONS

- Each user can manage only their own tasks.
- Soft deleted tasks are hidden from the main task list.
- Deleted tasks can be restored or permanently deleted from the Deleted Tasks page.

------------------------------------------------------------

AUTHOR

Ama Siriwardhana  











































<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
