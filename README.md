<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# Alien Matrix | Team-60 E-Commerce

A high-performance, dark-themed e-commerce platform built for the **Team-60** university project. This application features a custom-built product variant system and a dynamic user review module, all wrapped in a sleek "Alien Matrix" aesthetic.

## Key Features

* **Dynamic Product Management**: Supports complex variants (size, stock, and pricing) that update in real-time on the product page via JavaScript.
* **Integrated Review System**: A full-stack review module allowing authenticated users to leave star ratings and feedback directly on product pages.
* **Centered UI/UX**: Optimized review layouts and product displays centered for better readability and a premium feel.
* **Authentication Gates**: Smart logic that handles guest vs. authenticated user views for submitting reviews and accessing the basket.
* **Admin Dashboard**: Dedicated tools for product creation, category management, and inventory tracking.

## Technical Stack

* **Framework**: Laravel 12.x
* **Styling**: Tailwind CSS & DaisyUI
* **Database**: MySQL with relational integrity (Users, Products, Variants, Reviews)
* **Interactive Components**: Vanilla JavaScript and Blade Templating

## Installation & Local Setup

1.  **Clone the Repository**:
    ```bash
    git clone [https://github.com/Airnyan/Team-60.git](https://github.com/Airnyan/Team-60.git)
    cd Team-60
    ```

2.  **Install Dependencies**:
    ```bash
    composer install
    npm install && npm run build
    ```

3.  **Environment Configuration**:
    * Create a `.env` file from the example: `cp .env.example .env`
    * Generate your app key: `php artisan key:generate`
    * Configure your database credentials in the `.env` file.

4.  **Database Migration & Seeding**:
    Populate the store with initial test data (Users, Products, and Reviews):
    ```bash
    php artisan migrate --seed
    ```

5.  **Run the Application**:
    ```bash
    php artisan serve
    ```

## Core Architecture

* `app/Models/Review.php`: Manages product feedback and user relationships.
* `app/Http/Controllers/ProductController.php`: Handles product catalog logic and individual item views.
* `resources/views/product/show.blade.php`: The primary interactive product interface.

## 👥 Team 60
Built as a collaborative effort for the Team-60 university project.
