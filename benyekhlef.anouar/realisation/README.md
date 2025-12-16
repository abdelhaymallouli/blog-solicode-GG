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
```

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

## Database Setup

Create the database using MySQL Workbench or create it automatically:

```sql
CREATE DATABASE blogSolicode;
```

---

## Models Creation

Use Laravel Artisan to generate the following models:

```bash
php artisan make:model User
php artisan make:model Role
php artisan make:model Article
php artisan make:model Category
php artisan make:model Tag
php artisan make:model Comment
```

---

## Migrations Creation

### Main Tables

```bash
php artisan make:migration create_users_table
php artisan make:migration create_roles_table
php artisan make:migration create_articles_table
php artisan make:migration create_categories_table
php artisan make:migration create_tags_table
php artisan make:migration create_comments_table
```

### Pivot Tables (Many-to-Many Relationships)

```bash
php artisan make:migration create_role_user_table --create=role_user
php artisan make:migration create_article_category_table --create=article_category
php artisan make:migration create_article_tag_table --create=article_tag
```

---

## Final Step

Run the migrations:

```bash
php artisan migrate
```

---

