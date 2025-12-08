# School Management System

A robust School Management System built with **Laravel**, designed to streamline administrative tasks and manage interactions between students, teachers, and classes.

## 🚀 Features

-   **Role-Based Access Control (RBAC):**
    -   **Admin:** Full control over the system (manage users, classes, subjects, etc.).
    -   **Teacher:** Manage classes, attendance, and grades.
    -   **Student:** View schedules, grades, and attendance.
-   **User Management:** Secure authentication and profile management.
-   **Class Management:** Organize students and teachers into classes.
-   **Academic Management:** Handle subjects, grades, and attendance records.
-   **Modern UI:** Built with Tailwind CSS and Alpine.js for a responsive experience.

## 🛠️ Tech Stack

-   **Backend:** Laravel 11 / PHP 8.2+
-   **Frontend:** Blade Templates, Tailwind CSS, Alpine.js
-   **Database:** MySQL
-   **Packages:**
    -   `spatie/laravel-permission` (Roles & Permissions)

## ⚙️ Installation

Follow these steps to set up the project locally:

1.  **Clone the repository**
    ```bash
    git clone https://github.com/yourusername/school-management.git
    cd school-management
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install
    ```

3.  **Environment Setup**
    Copy the example environment file and configure your database credentials:
    ```bash
    cp .env.example .env
    ```
    Edit `.env` to match your database configuration:
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=school_management
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4.  **Generate App Key**
    ```bash
    php artisan key:generate
    ```

5.  **Run Migrations & Seeders**
    This will set up the database tables and populate them with sample data (including the admin account).
    ```bash
    php artisan migrate:fresh --seed
    ```

6.  **Start the Server**
    You need two terminals:
    ```bash
    # Terminal 1: Start Laravel server
    php artisan serve

    # Terminal 2: Compile assets
    npm run dev
    ```

## 🔑 Testing Accounts

The database seeder creates a default admin account and generates random data for teachers and students.

### **Super Admin**
-   **Email:** `admin@admin.com`
-   **Password:** `password`

### **Teachers & Students**
The system generates **20 Teachers** and **100 Students** with random emails.
-   **Password for all generated users:** `password`

To find a valid email to test as a Student or Teacher, you can check the database or run this command in `php artisan tinker`:

```php
// Get a random Teacher email
App\Models\User::role('teacher')->inRandomOrder()->first()->email;

// Get a random Student email
App\Models\User::role('student')->inRandomOrder()->first()->email;
