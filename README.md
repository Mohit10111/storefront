# Frontend Development Intern Assessment

This is a premium, full-stack Laravel storefront application built as part of the Frontend Development Intern Assessment. It features a luxury-inspired consumer storefront and a comprehensive Admin Dashboard for managing products and categories.

## Features & Architecture

### Layout Architecture
- Master layout with reusable Blade components (Header, Footer, Sidebar, Mini Cart).
- Completely DRY structure sharing the same base across all storefront pages.

### Premium Storefront
- **Dynamic Header:** Transparent header on the Hero section that smoothly transitions to a solid color when scrolling.
- **Off-Canvas Sidebar & Mini Cart:** Smooth sliding animations from left/right with full-height overlay backgrounds and scroll-locking.
- **Luxury Aesthetic:** 100vh hero section, responsive image grids, minimal typography, and hover micro-animations on product/category cards.
- **Dynamic Storefront:** All products and categories are pulled directly from the database without any hardcoded data.

### Admin Panel & Modules
- **Category Module:** Complete CRUD management with image uploading. Features a JavaScript-driven multi-step form ensuring one field is visible at a time.
- **Product Module:** Complete CRUD management with image uploading. Features a 7-step form workflow. Data persists when navigating back and forth between steps.
- **Conditional Visibility:** Products with Quantity = 0 or Status = 'inactive' are completely hidden from the consumer storefront.

## Setup Instructions

To get the application running on your local machine, follow these steps:

1. **Clone the repository:**
   ```bash
   git clone <your-repository-url>
   cd storefront
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install Node dependencies & compile assets:**
   ```bash
   npm install
   npm run build
   ```

4. **Environment Setup:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Note: Please configure your `.env` file with your local database credentials.*

5. **Run Migrations & Seeders:**
   ```bash
   php artisan migrate:fresh --seed
   ```
   *Important: Running the seeder is required to populate the database with the pre-configured categories, dummy products, and premium image assets used in the storefront design.*

6. **Link Storage (for images):**
   ```bash
   php artisan storage:link
   ```

7. **Serve the Application:**
   ```bash
   php artisan serve
   ```

## Assumptions Made During Development
- **Authentication:** It is assumed that the Admin Panel is meant to be protected. Standard Laravel Breeze authentication is used.
- **Design Direction:** The assessment emphasized "clean architecture." This was extended to the UI, applying a modern, high-end fashion/apparel aesthetic to demonstrate strong CSS competency.
- **Image Handling:** Default seeded images are shipped with the repository in the public directory to ensure the storefront looks complete immediately upon seeding without requiring manual Admin uploads by the reviewer.

## Tech Stack
- Laravel 11
- Blade Templating
- Vanilla CSS (for maximum architectural control and custom animations)
- Vite
