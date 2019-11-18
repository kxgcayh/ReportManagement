# Report Management

> Dalam bahasa Inggris yaitu Report Management yang artinya</br>Pengelolaan Laporan atau bisa disingkat menjadi RP Man

---

## Table of Contents

- [Report Management](#report-management)
  - [Table of Contents](#table-of-contents)
  - [Features](#features)
  - [Installation](#installation)
    - [Required Apps](#required-apps)
    - [Clone](#clone)
    - [Setup](#setup)
  - [Usage](#usage)
  - [License](#license)

---

## Features

- Laravel [Authentication](https://laravel.com/docs/6.x/authentication)
- Laravel [Email Verification](https://laravel.com/docs/6.x/verification)
- Laravel [Hashing](https://laravel.com/docs/6.x/hashing)
- Laravel [Eloquent Relationship](https://laravel.com/docs/6.x/eloquent-relationships)
- Laravel [Database: Pagination](https://laravel.com/docs/6.x/pagination)
- Laravel [Database: Migrations](https://laravel.com/docs/6.x/migrations)
- Laravel [Database: Seeding](https://laravel.com/docs/6.x/seeding)
- Laravel [Role and Permission](https://docs.spatie.be/laravel-permission/v3/introduction/)
  - Role and Permission List

  |  Id   |  Role   | guard_name |
  | :---: | :-----: | :--------: |
  |   1   |  Admin  |   `web`    |
  |   2   | Manager |   `web`    |
  |   3   |  User   |   `web`    |

  - Permission List

  |  Id   |     Permission      | guard_name |       |  Id   |     Permission     | guard_name |
  | :---: | :-----------------: | :--------: | :---: | :---: | :----------------: | :--------: |
  |   1   |     View Brands     |   `web`    |       |  10   | Manage Productions |   `web`    |
  |   2   |    Manage Brands    |   `web`    |       |  11   |   View Projects    |   `web`    |
  |   3   |   View Categories   |   `web`    |       |  12   |  Manage Projects   |   `web`    |
  |   4   |  Manage Categories  |   `web`    |       |  13   |     View Roles     |   `web`    |
  |   5   |  View Departements  |   `web`    |       |  14   |    Manage Roles    |   `web`    |
  |   6   | Manage Departements |   `web`    |       |  15   |     View Types     |   `web`    |
  |   7   |   View Locations    |   `web`    |       |  16   |    Manage Types    |   `web`    |
  |   8   |  Manage Locations   |   `web`    |       |  17   |     View Users     |   `web`    |
  |   9   |  View Productions   |   `web`    |       |  18   |    Manage Users    |   `web`    |

---

## Installation

### Required Apps

> For Running this applications you should have some Installed other Applications:

- Installed [Chrome](http://bit.ly/chrome-site) or [Firefox](https://www.mozilla.org/en-US/firefox/new/) Browser
- Installed [XAMPP](https://www.apachefriends.org/download.html)
- Installed [Composer](https://getcomposer.org/)
- Installed [Laravel](https://laravel.com/docs/6.x/installation)
- Installed [NodeJS](https://nodejs.org/en/download/)

> Have an [Mailtrap](mailtrap.io) Account, for config `.env` file

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
DB_DATABASE=[database-name]
DB_USERNAME=[xampp-username]
DB_PASSWORD=[xampp-password]
...
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=[smtp-username]
MAIL_PASSWORD=[smtp-password]
MAIL_FROM_ADDRESS=system@rpman.com
MAIL_FROM_NAME=Report Management
MAIL_ENCRYPTION=tls
```

> Get your smtp-username and smtp-password in Integrations Column after registering mailtrap account

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
| kautsar@admin.com | password |
| benny@manager.com | password |
|  galih@user.com   | password |

---

## License

[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)
