# Report Management

> Dalam bahasa Inggris yaitu Report Management yang artinya Pengelolaan Laporan
> atau bisa disingkat menjadi RP Man

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

```shell
$ cd ReportManagement
$ composer install
$ npm install && npm run dev
$ cp .env.example .env
$ php artisan key:generate
```

- Create a Database
> Then config your `.env` file.

```shell
$ php artisan migrate:fresh --seed
```
---

## Usage

```shell
$ php artisan serve
```

> Login with

|       Email       | Password |
| :---------------: | :------: |
| kautsar@admin.com | password |

---

## License

[![License](http://img.shields.io/:license-mit-blue.svg?style=flat-square)](http://badges.mit-license.org)

- **[MIT license](http://opensource.org/licenses/mit-license.php)**
