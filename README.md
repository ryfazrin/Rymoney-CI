# Rymoney-CI

## What is Rymoney-CI?

Rymoney-CI is a simple money management application build using CodeIgniter 4.

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

## Features

- [ ] Register (Daftar)
- [ ] Login (Masuk)
- [ ] Forgot Password (Lupa Password)
- [ ] Reset Password
- [ ] Send Auth Email (Auth dengan Email)
- [ ] Setting Account (Setelan Akun)
- [ ] Dashboard
- [x] Uang Masuk
- [x] Kategori Uang Masuk
- [x] Uang Keluar
- [x] Kategori Uang Keluar

## Technology 

- [Codeigniter 4](https://codeigniter.com/)
- [Codeigniter 4 Auth](https://github.com/divpusher/codeigniter4-auth)
- [MySql (XAMPP)](https://www.apachefriends.org/download.html) 
- Template: [SB Admin](https://github.com/startbootstrap/startbootstrap-sb-admin-2)

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Link 

https://designpatternsphp.readthedocs.io/en/latest/Creational/Builder/README.html

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
