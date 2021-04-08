<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

- Deploy the Laravel framework (minimum version 8)
- Make entities (tables): User, Department, Position A user can be in several departments, but still have only one position (use connections)
- Implement CRUD
- The user must be able to upload photos
- Display data in the table view, you can use ready-made css frameworks, such as Bootstrap
- Make the permissions for Admin, Manager, User.
Admin - has all the rights
Manager-can change data, add data, but cannot delete records
User - can only view data
- Date output format DD.MM.YYYY

## Setup  Project

-Clone project by this command
 git clone https://github.com/srb2305/laravel8.2test.git

-update composer 
 composer update

-migrate command will create database tables and some dummy data.
 php artisan migrate

-Key generate
 php artisan key:generate

-Run project
 php artisan serve

## Dummy Login credentials

Type	Email	            Passowrd
Admin	admin@gmail.com	    12345678
Manager	manager@gmail.com	12345678
User	admin@gmail.com	    12345678

## Developer
Saurabh Sahu
web.saurabhsahu@gmail.com


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
