# My Schoolie - Open source school management application

A free to use school management application. Written in Cakephp 3.x and MySql.
We are constantly updating the list of available modules whenever they are ready. If you have any issues, please raise a new [issue here](https://github.com/chilarai/MySchoolie-SchoolManagement/issues)

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.

```
cd <application-folder>
composer install
```

2. If you want to try out, please rename the main folder of your project to **myschoolieadmin** instead of any other name

3. Rename **config/app.default.php** to **app/default.php** and change the following
* mysql credentials in `Datasources>default` section
* Remember to set `SECURITY_SALT` value to something else

Database file can be found in `Database` folder in the root directory. Please import the mysql file and change the credentials in `config/app.php` as specified by [Cakephp 3.x](https://cakephp.org/)

### Demo Admin Credentials
http://localhost/myschoolieadmin/users/login

**Username**: 1234567890
**Password**: 123

## Available Modules

1.  Student admission and details
2.  Student and Staff attendance
3.  Teaching and Admin staffs
4.  Leaves
5.  Assignments
6.  Anecdotes
7.  Canteen
8.  Timetable
9.  Appointments
10. Circulars
11. Courses and Subjects

We are working on more modules and will update as soon as they are ready.

If you wish to contribute to the project, please feel free to do so. We will be glad to accept new contributors
