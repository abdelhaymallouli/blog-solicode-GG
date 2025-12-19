# Solicode Blog

## Prerequisites

* PHP (compatible with Laravel)
* Composer
* Node.js & npm
* MySQL / MySQL Workbench

---

## Installation

```bash
composer install
npm install
````

---

## Environment Configuration

Edit the `.env` file with your database credentials:

```env
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=blogSolicode  
DB_USERNAME=root  
DB_PASSWORD=your_password
```


---


## Seeders Creation

Create seeders to import CSV test data:

```bash
php artisan make:seeder RoleSeeder
php artisan make:seeder CategorySeeder
php artisan make:seeder TagSeeder
php artisan make:seeder ArticleSeeder
php artisan make:seeder CommentSeeder
php artisan make:seeder PivotSeeder
```

---

## Running Seeders

You can run each seeder individually:

```bash
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=TagSeeder
php artisan db:seed --class=ArticleSeeder
php artisan db:seed --class=CommentSeeder
php artisan db:seed --class=PivotSeeder
```

Or run all seeders together via `DatabaseSeeder.php`:

```bash
php artisan db:seed
```
