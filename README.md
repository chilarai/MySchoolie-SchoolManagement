# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

This tutorial has been created by Rohit Verma  [Facebook Profile](http://facebook.com/readerror) .

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.
3. Import cakephp.sql to mysql

If Composer is installed globally, run
```bash
composer create-project --prefer-dist cakephp/app [app_name]
```
3. git init
4. git clone
5. composer install

6. config/app.php -> Change your database connectivity here.

7. Create controller "UsersController" for Action "Insert" , "Update" , "Delete" and "Select"

8. Create a folder in src/Template  named exactly  as Controller eg Users and for every action create a new php file.

eg  in Folder User we have insert.ctp, update.ctp and select.ctp.
	note : For delete we dont need to create a ctp file.

9.In Model we create 3 php files for each models behavior(Users.php),entity(Users.php) and table(Userstable.php).each having their own folder.
  table will have the relationship.
10. Calling a specific layout inside a method "$this->viewBuilder()->layout('ajax');"