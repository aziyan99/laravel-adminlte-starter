[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]

<br />
<div align="center">
  <a href="javascript:void(0);">
    <img src="https://i.ibb.co/wgWwMK9/Screen-Shot-2022-03-18-at-12-41-43.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">Starter</h3>

  <p align="center">
    An simple admin dashboard starter with Laravel and AdminLTE.
    <br />
    <a href="https://github.com/aziyan99/laravel-adminlte-starter/issues">Report Bug</a>
    ·
    <a href="https://github.com/aziyan99/laravel-adminlte-starter/issues">Request Feature</a>
  </p>
</div>

## About The Project

[![Product Name Screen Shot][product-screenshot]](http://localhost)

This is a starter admin dashboard project built on top of Laravel and AdminLTE. The starter including Access Control Level based on permissions and roles.

### Built With

* [Laravel Framework](https://laravel.com/)
* [AdminLTE](https://adminlte.io/)

## Getting Started

To make the starter run on your machine just following below instructions.

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* Clone the respository
  ```sh
    git clone https://github.com/aziyan99/laravel-adminlte-starter
  ```
* Compatible PHP version and configs for running Laravel 11.x
* MySQL or MariaDB database
* Configure .env file

### Installation

1. `npm run build` to build the assets
2. `php artisan key:generate`
4. `php artisan migrate:fresh`
5. `php artisan db:seed`
6. `php artisan serve` or another web server that able to run PHP based website

### Authentication
- URL `http://<domain-local>/login` or configurated URL.
- Admin:
    - Email: `admin@local.test` 
    - Password: `password`

## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

[contributors-shield]: https://img.shields.io/github/contributors/aziyan99/laravel-adminlte-starter.svg?style=for-the-badge
[contributors-url]: https://github.com/aziyan99/laravel-adminlte-starter/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/aziyan99/laravel-adminlte-starter.svg?style=for-the-badge
[forks-url]: https://github.com/aziyan99/laravel-adminlte-starter/network/members
[stars-shield]: https://img.shields.io/github/stars/aziyan99/laravel-adminlte-starter.svg?style=for-the-badge
[stars-url]: https://github.com/aziyan99/laravel-adminlte-starter/stargazers
[issues-shield]: https://img.shields.io/github/issues/aziyan99/laravel-adminlte-starter.svg?style=for-the-badge
[issues-url]: https://github.com/aziyan99/laravel-adminlte-starter/issues
[license-shield]: https://img.shields.io/github/license/aziyan99/laravel-adminlte-starter.svg?style=for-the-badge
[license-url]: https://github.com/aziyan99/laravel-adminlte-starter/blob/main/LICENCE.txt
[product-screenshot]: https://i.ibb.co/q7KVQgT/screencapture-laravel-adminlte-starter-test-backend-settings-index-2022-03-18-12-45-47.png

