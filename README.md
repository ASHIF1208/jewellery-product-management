# Jewellery Product Management

## Description
This is a Jewellery Product Management application built using PHP and Laravel. The application aims to provide a comprehensive system for managing jewellery products, including product listing, inventory management, categorization, pricing, order tracking, and sales analytics. It is designed to streamline the operations of jewellery stores by offering an intuitive interface for both customers and administrators.

## Features
- Product categorization
- Inventory tracking with stock management
- Supplier management (Note: Supplier management is not currently implemented)
- Pricing and discount management
- Order and sales tracking
- Reports and analytics (basic dashboard features)
- User authentication and profile management
- Shopping cart and wishlist functionality
- Admin dashboard for product and order management

## Installation

### Requirements
- PHP 8.2 or higher
- Composer
- Laravel Framework 12.x
- A supported database (e.g., MySQL, PostgreSQL, SQLite)
- Node.js and npm (for frontend assets)

### Steps
1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd jewellery_management
   ```

2. Install PHP dependencies using Composer:
   ```bash
   composer install
   ```

3. Copy the example environment file and configure your environment variables:
   ```bash
   cp .env.example .env
   ```
   Update `.env` with your database credentials and other necessary configurations.

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

5. Run database migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

6. Install frontend dependencies and build assets:
   ```bash
   npm install
   npm run dev
   ```

7. Start the development server:
   ```bash
   php artisan serve
   ```

8. Access the application at `http://localhost:8000`.

## Usage

### Product Management
- Admin users can add, edit, and delete products via the admin dashboard.
- Products can be categorized and assigned stock quantities.
- Product images can be uploaded and managed.

### Inventory Management
- Stock levels are tracked for each product.
- Admins can update stock quantities when adding or editing products.

### Order Management
- Customers can add products to their cart and place orders.
- Orders include shipping and billing information, payment method, and order status.
- Users can view their order history and details.

### Reports and Analytics
- The dashboard provides recent order and wishlist summaries for users.
- Admin reports and advanced analytics can be extended as needed.

## API Documentation

### Authentication
- The application uses Laravel Sanctum for API authentication.
- Authenticated users can access the `/api/user` endpoint to retrieve their user information.

### Endpoints
- Currently, the API routes are minimal and primarily support user authentication.
- Future API endpoints can be added to support product, order, and inventory management.

## Contributing

We welcome contributions to improve the Jewellery Product Management system. Please follow these guidelines:

- Fork the repository and create your feature branch:
  ```bash
  git checkout -b feature/your-feature-name
  ```
- Commit your changes with clear messages:
  ```bash
  git commit -m "Add feature description"
  ```
- Push to your branch:
  ```bash
  git push origin feature/your-feature-name
  ```
- Submit a pull request describing your changes.

### Coding Standards
- Follow PSR-12 coding standards for PHP.
- Write clear, maintainable, and well-documented code.
- Include tests for new features or bug fixes where applicable.