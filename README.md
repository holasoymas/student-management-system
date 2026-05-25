# 🎓Student Management System (SMS)

A high-performance, enterprise-grade administrative control portal built to manage campus operations,
academic records, and student lifecycles. This application focuses heavily on
**data integrity, system automation, and optimal developer experience (DX)**.

---

## 🚀 Key Architectural Features

* **Zero-Error Data Entry:** The interface is strictly designed around business workflows rather than raw database entry.
Administrators are fully insulated from interacting with database keys (`id`). 
For example, Enrollments are handled via a *Course-Centric Contextual Action*,
utilizing multi-select searchable relations to map foreign keys securely behind the scenes.
* **Robust Relational Mapping:** Features fully automated tracking between core master data and relational event logs:
  * `Students` (Master Profiles & Identity)
  * `Courses` (Academic Curriculum Catalog)
  * `Enrollments` (Pivot tracking connecting Students to Courses)
  * `Grades` (Academic mark logging and assessment tracking)

---

## 🛠️ Tech Stack & Systems Architecture

* **Framework:** Laravel 11 (PHP)
* **Admin Engine:** Filament v3 (Admin Panel Provider)
* **Reactivity Layer:** Laravel Livewire (Server-side HTML diffing over background AJAX)
* **Database:** MySQL / PostgresSQL (Fully normalized with strict foreign key constraints)

---

## 📦 Local Installation & Setup Guide

Follow these steps to clone, configure, and boot the entire system locally on your machine.

### 1. Clone the Repository
```bash
git clone https://github.com/hoasloymas/student-management-system.git
cd student-management-system
```

### 2. Install Dependencies
```bash
composer install
```
*(Note: Ensure you have `ext-intl` enabled in your system's `php.ini` file before running the install).*

### 3. Environment Configuration
Copy the template environment file and generate your application encryption key:
```bash
cp .env.example .env
php artisan key:generate
```

Open the `.env` file in your editor and update your database credentials. For a clean local setup, you can use these standard environment blocks:

```.env
APP_NAME="Student Management System"
APP_ENV=local
APP_DEBUG=true
APP_TIMEZONE=Asia/Kathmandu
APP_URL=http://localhost:8000

# Database Configuration
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=<YOUR-DB>
DB_USERNAME=<YOUR-DB-NAME>
DB_PASSWORD=<YOUR-DB-PASS>

# Session and Cache Drivers
SESSION_DRIVER=database
SESSION_LIFETIME=120
CACHE_STORE=database
QUEUE_CONNECTION=database
```

### 4. Database Migrations & Automated Seeding
Run the database migrations to compile your schema tables, and trigger the built-in Model Factories and Seeders to populate the system with a realistic testing workload:

```bash
php artisan migrate --seed
```

### 5. Create Your Administrative Profile
Generate an authorized user account to log into the secure dashboard panel:

```bash
php artisan make:filament-user
```
Follow the terminal prompts to enter your name, email address, and secure password.

### 6. Start the server
```bash
php artisan serve
```

Navigate to [http://127.0.0.1:8000](http://127.0.0.1:8000).
