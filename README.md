<div align="center">
  <h1 align="center">Aura Storefront</h1>
  <p align="center">
    A premium, full-stack e-commerce storefront built with Laravel, featuring a luxury-inspired consumer interface and a comprehensive Admin Dashboard.
  </p>
</div>

---

## 💎 Overview

**Aura Storefront** is a modern, high-performance e-commerce platform. It separates the consumer experience—a beautifully animated, luxury-tier storefront—from the administrative backend, which provides a robust interface for inventory and category management.

The project is built on **Laravel 11** and focuses heavily on clean architectural patterns, component reusability, and modern CSS practices to deliver a flawless, JavaScript-light user experience.

## ✨ Core Features

### Premium Storefront Interface
- **Dynamic Header System:** Transparent header on the Hero section that seamlessly transitions to a solid state via Intersection Observers when scrolling.
- **Off-Canvas Navigation & Cart:** Smooth sliding sidebars for mobile navigation and mini-cart functionality, complete with full-height overlays and scroll-locking.
- **Luxury Aesthetic:** Designed with a 100vh hero section, masonry-style responsive image grids, minimal typography, and fluid micro-animations on product and category cards.
- **Dynamic Data Injection:** All products and categories are hydrated directly from the Eloquent ORM without hardcoded state.

### Administrative Dashboard
- **Category Management:** Full CRUD capabilities with image uploading. Utilizes a JavaScript-driven multi-step form workflow.
- **Inventory Management:** Complete CRUD interface for products with a comprehensive 7-step form workflow. Form state persists seamlessly across steps.
- **Dynamic Visibility:** Products with zero inventory (`Quantity = 0`) or disabled statuses (`Status = inactive`) are automatically hidden from the consumer storefront via Eloquent query scopes.

## 🛠️ Tech Stack

- **Backend:** Laravel 11 (PHP 8.2+)
- **Frontend Engine:** Blade Templating
- **Styling:** Vanilla CSS (optimized for maximum architectural control and custom cubic-bezier animations)
- **Asset Bundling:** Vite
- **Database:** SQLite / MySQL

## 🚀 Quick Start

To get the application running on your local development environment:

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Mohit10111/storefront.git
   cd storefront
   ```

2. **Install PHP Dependencies:**
   ```bash
   composer install
   ```

3. **Install Node Dependencies & Compile Assets:**
   ```bash
   npm install
   npm run build
   ```

4. **Environment Setup:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Configure your `.env` file with your local database credentials.*

5. **Run Migrations & Seed Database:**
   ```bash
   php artisan migrate:fresh --seed
   ```
   *Note: Running the seeder is required to populate the database with the core categories, dummy products, and premium image assets required for the UI.*

6. **Link Storage (for image uploads):**
   ```bash
   php artisan storage:link
   ```

7. **Serve the Application:**
   ```bash
   php artisan serve
   ```
   Visit `http://localhost:8000` in your browser.

## 📁 Architectural Highlights

- **Component Reusability:** Heavy reliance on Laravel Blade Components (e.g., `<x-product-card>`, `<x-category-card>`) to keep views DRY.
- **Scoped Queries:** Business logic for product visibility is encapsulated within Eloquent local scopes (`scopeAvailable()`) to ensure the storefront never accidentally displays out-of-stock items.
- **Modular Forms:** Complex administrative data entry is broken down into modular, multi-step forms using vanilla JavaScript, avoiding heavy frontend frameworks for simple DOM manipulation.
