# Nathany Artz

Official portfolio and online art gallery web application for **Nathan Msuya (`Nathany_artz`)**, a Zanzibari visual artist specializing in African fine art, realism, abstract compositions, and custom portraits.

## Features

- **Public Art Gallery (`index.php`)**
  - Responsive landing page with sticky glassmorphism navigation, hero showcase, paginated gallery (6 artworks per page), artist biography, and studio contact section.
  - Direct WhatsApp inquiry buttons pre-populated with each artwork's title, description, and price.
- **Artwork Detail View (`details.php`)**
  - Dedicated view for each piece displaying full imagery, description, pricing (USD), direct WhatsApp inquiry link, and Previous/Next artwork navigation.
- **Admin Dashboard (`admin.php`, `login.php`, `logout.php`)**
  - Session-protected admin panel with password verification (`password_verify`).
  - Paginated artwork table with live search, client-side column sorting, and confirmation modal for deletion.
- **Artwork Management (`add.php`, `edit.php`, `delete.php`, `delete_action.php`)**
  - Upload new paintings with live image preview (supports `jpg`, `jpeg`, `png`, `gif`, `webp`).
  - Edit existing artwork titles, descriptions, prices, and images.
  - Delete artworks from both the database and the `uploads/` directory.

## Tech Stack

- **Backend:** PHP (configured for PHP 8.2 via `.htaccess`)
- **Database:** MySQL / MariaDB (`mysqli`)
- **Frontend:** HTML5, CSS3, Bootstrap 5, Font Awesome 6, Google Fonts (`Inter`, `Poppins`), Vanilla JavaScript

## Project Structure

```text
.
├── index.php             # Main public gallery, hero, about, and contact page
├── details.php           # Individual artwork detail page with WhatsApp inquiry
├── login.php             # Admin authentication page
├── logout.php            # Admin session termination
├── admin.php             # Admin dashboard for managing artworks
├── add.php               # Add new painting & upload image
├── edit.php              # Update painting metadata or replace image
├── delete.php            # Standalone delete confirmation page
├── delete_action.php     # AJAX endpoint for deleting artworks & reindexing IDs
├── config.php            # MySQL database connection configuration
├── art_gallery.sql       # Database schema and sample data
├── .htaccess             # cPanel PHP 8.2 handler configuration
├── uploads/              # Uploaded artwork images, logo, and artist photo
└── admin/                # Admin directory configuration
```

## Setup & Installation

### Prerequisites

- PHP 8.0+ (with `mysqli` extension enabled)
- MySQL or MariaDB
- Apache web server (e.g., cPanel hosting, XAMPP, Laragon, or WAMP)

### 1. Database Setup

Import `art_gallery.sql` into your MySQL server (via phpMyAdmin or CLI):

```sql
SOURCE art_gallery.sql;
```

This creates the `paintings` table with columns for `id`, `title`, `artist`, `description`, `price`, `image_url`, `whatsapp_number`, and `created_at`.

### 2. Configure Database Connection

Update `config.php` with your environment's database host, username, password, and database name:

```php
<?php
$host = "localhost";
$user = "your_db_user";
$pass = "your_db_password";
$dbname = "your_db_name";
```

### 3. Uploads Directory

Ensure the `uploads/` folder exists in the document root and is writable by the web server so new artwork uploads succeed.

### 4. Admin Access

Navigate to `/login.php` to sign in to the admin dashboard (`/admin.php`). Admin credentials are configured in `login.php` using PHP's `password_hash()` / `password_verify()`.

## Contact & Artist Info

- **Artist:** Nathan Msuya (`Nathany_artz`)
- **Studio:** Stone Town, Zanzibar
- **Instagram:** [@Nathany_artz](https://instagram.com/Nathany_artz)
