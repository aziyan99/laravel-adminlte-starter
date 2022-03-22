<div id="top"></div>

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="https://i.ibb.co/wgWwMK9/Screen-Shot-2022-03-18-at-12-41-43.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">Laravel AdminLTE Starter</h3>

  <p align="center">
    An simple starter admin dashboard with Laravel and AdminLTE.
    <br />
    <a href="https://github.com/aziyan99/laravel-adminlte-starter/issues">Report Bug</a>
    ·
    <a href="https://github.com/aziyan99/laravel-adminlte-starter/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
        <li><a href="#Authentication">Authentication</a></li>
      </ul>
    </li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

[![Product Name Screen Shot][product-screenshot]](https://example.com)

This is a starter project built on top of Laravel 8.x and AdminLTE. The starter including Role and Permisson from spatie-permission and laravolt for default avatar generator.

<p align="right">(<a href="#top">back to top</a>)</p>



### Built With

* [Laravel Framework](https://laravel.com/)
* [AdminLTE](https://adminlte.io/)
* [Spatie Permssion](https://spatie.be/docs/laravel-permission/v5/introduction)
* [Laravolt Avatar](https://github.com/laravolt/avatar)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

To make the starter run on your dev server just following below instructions.

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* Clone the respository
  ```sh
    git clone https://github.com/aziyan99/laravel-adminlte-starter
  ```
* PHP 8.0 or above
* MySQL or MariaDB database
* Configure .env file

### Installation

1. `npm run dev` to compile assets
2. `php artisan key:generate`
3. `php artisan storage:link`
4. `php artisan migrate:fresh`
5. `php artisan db:seed`
6. `php artisan serve` or just using laravel-valet

### Authentication
- URL `http://localhost:8000/login` or configurated URL.
- Admin:
    - Email: `superadmin@example.com` 
    - Password: `password`


<p align="right">(<a href="#top">back to top</a>)</p>

## Debug
1. Different PHP version. If failed to running (serve) the project try running `composer update` before running `php artisan serve`.
2. Branch `php74` contain composer config that running on php7.4.x

## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Raja Azian - [@iniezzy](https://twitter.com/iniezzy) - rajaazian08@gmail.com

Project Link: [https://github.com/aziyan99/laravel-adminlte-starter](https://github.com/aziyan99/laravel-adminlte-starter)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

* [Laravel Framework](https://laravel.com/)
* [AdminLTE](https://adminlte.io/)
* [Spatie Permssion](https://spatie.be/docs/laravel-permission/v5/introduction)
* [Laravolt Avatar](https://github.com/laravolt/avatar)
* [Choose an Open Source License](https://choosealicense.com)
* [GitHub Emoji Cheat Sheet](https://www.webpagefx.com/tools/emoji-cheat-sheet)
* [Img Shields](https://shields.io)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
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
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/raja-azian
[product-screenshot]: https://i.ibb.co/q7KVQgT/screencapture-laravel-adminlte-starter-test-backend-settings-index-2022-03-18-12-45-47.png
