[![Contributors](http://img.shields.io/:contributors-2-brightgreen.svg?style=flat-square)](https://github.com/kautsaralbana/ReportManagement/graphs/contributors)
[![Issues](http://img.shields.io/:issues-1-red.svg?style=flat-square)](https://github.com/kautsaralbana/ReportManagement/issues)
[![Laravel](http://img.shields.io/:laravel-5.8-informational.svg?style=flat-square)](https://laravel.com/docs/5.8)
[![PHP](http://img.shields.io/:php-7.3-informational.svg?style=flat-square)](https://www.php.net/releases/7_3_0.php)
[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)

---

# Report Management

> Dalam bahasa Inggris yaitu Report Management yang artinya</br>Pengelolaan Laporan atau bisa disingkat menjadi RP Man

---

<!-- Daftar Isi -->
## Daftar Isi
* [Prasyarat](#prasyarat)
* [Instalasi](#instalasi)
* [Menjalankan Aplikasi](#menjalankan-aplikasi)
* [Kontribusi](#kontribusi)
* [Lisensi](#lisensi)
* [Kontak Info](#kontak-info)

---

<!-- Prasyarat -->

## Prasyarat
Untuk memasang aplikasi ini pada komputer anda ada beberapa paket yang harus terpasang yaitu:
* [Browser](https://www.google.com/chrome/)
* [XAMPP](https://www.apachefriends.org/blog/new_xampp_20181213.html)
* [Laravel Framework](https://laravel.com/docs/5.8)

---

<!-- INSTALASI -->

## Instalasi

1. Buka Command Prompt dalam folder lokal server
2. Clone Repository `https://github.com/kautsaralbana/ReportManagement.git`
3. Buka XAMPP dan Buatlah Database Baru
4. Masuk ke Dalam Folder Aplikasi Report Management `cd ReportManagement`
5. Install Composer `composer install`
6. Jalankan NPM `npm install && npm run dev`
7. Konfigurasi Aplikasi
    1. Buat file .env `cp .env.example .env`
    2. Buat key dalam .env `php artisan key:generate
    3. Buka file .env dan edit file tersebut
    ```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE='NAMA DATABASE'
    DB_USERNAME='USERNAME ANDA'
    DB_PASSWORD='PASSWORD ANDA'
    
    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME='USERNAME ANDA'
    MAIL_PASSWORD='PASSWORD ANDA'
    MAIL_FROM_ADDRESS=example@example.com
    MAIL_FROM_NAME=Admin RPMan
    MAIL_ENCRYPTION=tls

    ```
    
8. Migrate dan Seed Data ke Database `php artisan migrate:fresh --seed`

---

<!-- MENJALANKAN APLIKASI -->

## Menjalankan Aplikasi

```shell
cd .../ReportManagement
php artisan serve
```

* Buka Browser yang Tersedia dan Masukkan Link `http://localhost:8000/` Secara Default

> Login with

|       Email       | Password |  Status  |
| :---------------: | :------: | :------: | 
| admin@admin.com   | password |   Aktif  |
| manager@manager.com | password | Nonaktif |
|  user@user.com   | password | Aktif |

---

<!-- KONTRIBUSI -->
## Kontribusi

Ayo ikut berkontribusi dalam Aplikasi ini, sekecil apapun kontribusi anda itu akan sangat membantu.

1. Fork Project
2. Buatlah Fitur Branch (`git checkout -b feature/NamaFitur`)
3. Commit Perubahan (`git commit -m 'Nambahin Fitur Keren!'`)
4. Push ke Branch (`git push origin feature/NamaFitur`)
5. Membuat Pull Request



<!-- LICENSE -->
## Lisensi

Didistribusikan di bawah Lisensi MIT. Lihat `LICENSE` untuk informasi lebih lanjut.


<!-- KONTAK INFO -->
## Kontak Info

Kautsar Al Bana - kautsaralbana@hotmail.com

Project Link: [https://github.com/kautsaralbana/ReportManagement](https://github.com/kautsaralbana/ReportManagement)
