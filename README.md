<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->
# Duitku - Setup Guide

### 1. Install Dependency
Buka terminal di folder proyek, lalu jalankan:
composer install
npm install

### 2. Setup Environment (.env)
Salin file konfigurasi environment:
cp .env.example .env

Buka file `.env` baru tersebut menggunakan VS Code, lalu sesuaikan konfigurasi berikut:
1. Pastikan nama database sesuai dengan MySQL lokal Anda (Buat dulu database kosong bernama `db_duitku` di phpMyAdmin/MySQL Workbench):
   DB_DATABASE=db_duitku

2. Masukkan API Key Google Gemini kalian di bagian paling bawah file:
   GEMINI_API_KEY=isi_dengan_api_key_gemini_kalian

### 3. Generate Key & Kirim Tabel ke MySQL
php artisan key:generate
php artisan migrate --seed

### 4. Setup SSL (PENTING untuk Windows!)
Karena aplikasi ini menggunakan API eksternal (Google Gemini), komputer kalian wajib mengenali sertifikat SSL agar tidak terkena eror `cURL error 60`.

1. Download file `cacert.pem` melalui link resmi: https://curl.se/ca/cacert.pem
2. Simpan file tersebut di dalam folder PHP kalian (misalnya di `C:\xampp\php\cacert.pem` atau `C:\php\cacert.pem`).
3. Buka file `php.ini` kalian, cari baris `curl.cainfo` dan `openssl.cafile` (hapus tanda titik koma `;` di depannya jika ada).
4. Arahkan jalurnya ke file yang baru di-download tadi:
   curl.cainfo = "C:/xampp/php/cacert.pem"
   openssl.cafile = "C:/xampp/php/cacert.pem"
5. Save file `php.ini`, lalu restart terminal/XAMPP kalian.

### 5. Jalankan Aplikasi (Buka 2 Terminal terpisah)
*Gunakan terminal **Git Bash** agar tidak terkena hambatan restriction script Windows.*

Terminal 1 (Backend Server):
php artisan serve
-> Akses aplikasi di browser melalui: http://localhost:8000

Terminal 2 (Frontend Assets Compiler):
npm run dev
