# VUTTR

Very Useful Tools to Remember. A simple app to manage your tools that you want remember.

## Pre-requisites

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

## Installing and Configuring

Clone and access the project folder:

```bash
git clone https://github.com/sfelix-martins/vuttr.git
cd vuttr
```

Copy the `.env.example` file to `.env` and set your local configs:

```bash
cp .env.example .env
```

Install dependencies:

```bash
composer install
```

Generate the encryption key:

```bash
php artisan key:generate
```

Migrate database (Don't forget of configure your database credentials on .env file):

```bash
php artisan migrate
```

Finally, run your application:

```bash
php artisan serve --port=3000
```

Ready, now you can access your project from address `http://localhost:3000`

## API Docs

TODO
