# Report Management

> Dalam bahasa Inggris yaitu Report Management yang artinya</br>Pengelolaan Laporan atau bisa disingkat menjadi RP Man

---

## Table of Contents

- [Report Management](#report-management)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
    - [Clone](#clone)
    - [Setup](#setup)
  - [Usage](#usage)
  - [License](#license)

---

## Installation

### Clone

- Clone this repo to your local machine using `https://github.com/kautsaralbana/ReportManagement.git`

### Setup

- Open your Terminal for Linux or your CMD for Windows.

```shell
cd ~/ReportManagement
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
```

- Create a Database on Your XAMPP applications, example database name `report_management`
- Then edit your `.env` file on your local machine, example:

```shell
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=report_management
DB_USERNAME=root
DB_PASSWORD=
...
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=[username]
MAIL_PASSWORD=[password]
MAIL_FROM_ADDRESS=system@rpman.com
MAIL_FROM_NAME=Report Management
MAIL_ENCRYPTION=tls
...
```

- Then migrate and seed data

```shell
php artisan migrate:fresh --seed
```

---

## Usage

```shell
cd ~/ReportManagement
php artisan serve
```

- Open your Browser then insert your local server link or `http://localhost:8000/` by default

> Login with

|       Email       | Password |
| :---------------: | :------: |
| admin@admin.com | password |
| manager@manager.com | password |
|  user@user.com   | password |

---

## License

[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)
