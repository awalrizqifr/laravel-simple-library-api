## Installation

Clone the repo locally:

```sh
git clone https://github.com/awalrizqifr/mini-library-api.git
cd money-manager-api
```

Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Then create the necessary database. You can use MySQL, simply update your configuration accordingly.

Run database migrations:

```sh
php artisan migrate
```

Run the dev server (the output will give the address):

```sh
php artisan serve