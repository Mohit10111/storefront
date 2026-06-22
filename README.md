# Storefront

A simple Laravel-based Storefront application with Categories and Products management.

## Laravel Version

Laravel Framework 13.16.1

## Requirements

* PHP 8.2+
* Composer
* MySQL
* Node.js
* NPM

## Project Setup

### Clone Repository

```bash
git clone <repository-url>
cd storefront
```

### Install PHP Dependencies

```bash
composer install
```

### Install Frontend Dependencies

```bash
npm install
```

### Configure Environment

Copy the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

## Database Configuration

Update the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=storefront
DB_USERNAME=root
DB_PASSWORD=
```

Create the database in MySQL before running migrations.

## Run Migrations

```bash
php artisan migrate
```

## Start Development Server

```bash
php artisan serve
```

## Start Vite

```bash
npm run dev
```

Application URL:

```text
http://127.0.0.1:8000
```

## Verification

The project has been verified successfully:

* `php artisan migrate:fresh` runs successfully
* `composer install` runs successfully
* `npm install` runs successfully
* `npm run dev` runs successfully
