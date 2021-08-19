## Installation
1. `composer install`
2. `npm install`
3. `npm run dev`
4. `php artisan key:generate`
5. `php artisan storage:link`
6. Sesuaikan konfigurasi koneksi database di file `.env`
7. `php artisan migrate:fresh`
8. `php artisan db:seed`
9. `php artisan serve`

### Default login
- URL `http://localhost:8000/login`
- Admin:
    - Email: `superadmin@example.com` 
    - Password: `password`


## Producion
For production configuraion please referer to [https://laravel.com/docs/8.x/configuration](https://laravel.com/docs/8.x/configuration)
