
Figma: https://www.figma.com/file/z3FHt6b2J9WzAWoE3pkZcq/Masterboard?node-id=0%3A1&t=RqSsjF12qRpDYPWm-1

ERD: https://lucid.app/lucidchart/9a1cab09-f0a9-442d-a978-dfa0e3b312db/edit?viewport_loc=-669%2C-99%2C3945%2C1969%2C0_0&invitationId=inv_39c2fe27-80e4-464b-b9e3-ffd73aea9b29

Trello: https://trello.com/b/FaILhCut/masterboard

ScreenFlow: https://www.figma.com/file/Qj2A3fi7RsCjYLZrDSDn3c/CS-3105-Screenflow?node-id=0%3A1&t=s8OGxrQuUisViISM-1

Laravel Docs: https://laravel.com/docs/9.x/installation

# 3105 APPLICATION DEVELOPMENT - SANAOL AGENCY 

## About

Sanaol Agency is a web-based Content Management System built using Vue.js, Laravel, and Tailwindcss.

## Setup and Deployment Instructions/Steps:

1. After cloning and local repository initialization, open terminal or integrated terminal of project and do the following:
First, fetch dependencies in the root folder (SANAOL_AGENCY Folder):

```
npm install

composer update

```

2. Change directory to vue folder by typing 'cd vue' in the terminal and run the ff commands: 

```
npm install

npm run tailbuild

```

## Basic Commands To Run During Development 

During each and every development session, execute these commands:

### FRONTEND:


Terminal 1 - Launch a local dev server

```
npm run dev

```

Terminal 2 - watch for css changes; install compilation and build

```
npm run tailwatch

```

### BACKEND

First, make sure you have the database running in the server by setting up the database in phpmyadmin:

1. Turn on Apache and MySQL in XAMPP
2. go to http://localhost/phpmyadmin
3. create new database and name it '3105_DB'

Second, inside the VScode terminal:

```
composer install

php artisan key:generate

```

```
php artisan migrate

```

If you want to refresh the migration/seeder:

```
php artisan migrate:refresh --seed

```

To run the laravel localhost server:

```
php artisan serve

```




<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
