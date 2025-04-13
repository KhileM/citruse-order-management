# Citruse Purchase Order Management - Design Document

## 1. Introduction
This design document outlines the architecture and system design decisions for the Citruse Purchase Order Management System. The application is built using Laravel 11 for the backend, Vue 3 for the frontend, and PostgreSQL for the database. Docker is used to streamline local development.

The primary goal is to create a scalable and maintainable application that can be extended in future phases while meeting current business requirements.

## 2. Project Requirements
- User Authentication and Role Management
- Supplier and Distributor Information Management
- Product Catalog with Yearly Pricing
- Purchase Order Management
- Forecasting Report Preparation
- Mobile and Desktop Accessibility

## 3. Technology Stack
- Backend: Laravel 11 (PHP 8.2)
- Frontend: Vue 3 with Vite
- Authentication: Laravel Breeze (API stack with Sanctum)
- Database: PostgreSQL 15
- Development Environment: Docker
- Additional Tools: pgAdmin 4 for database management, Axios for API calls

## 4. Database Design

### Tables

**roles**
- id (Primary Key)
- name (string)

**users**
- id (Primary Key)
- name (string)
- email (string, unique)
- password (string)
- role_id (Foreign Key to roles)
- timestamps

**suppliers**
- id (Primary Key)
- name (string)
- contact_info (text)
- timestamps

**products**
- id (Primary Key)
- name (string)
- variety (string)
- created_at
- updated_at

**purchase_orders**
- id (Primary Key)
- order_number (string, unique)
- order_date (date)
- status (string)
- supplier_id (Foreign Key to suppliers)
- created_by (Foreign Key to users)
- timestamps

**purchase_order_items**
- id (Primary Key)
- purchase_order_id (Foreign Key to purchase_orders)
- product_id (Foreign Key to products)
- quantity (integer)
- price (decimal)
- timestamps

### Relationships
- Role has many Users
- User belongs to Role
- User has many Purchase Orders (created_by)
- Supplier has many Purchase Orders
- Purchase Order has many Purchase Order Items
- Purchase Order Item belongs to Purchase Order
- Purchase Order Item belongs to Product

A UML diagram and SQL schema file are included in the repository.

## 5. Application Architecture

### Backend (Laravel)
- Models represent database tables with defined relationships
- Controllers follow RESTful practices and include stubbed methods for CRUD operations
- API Routes are grouped under `auth:sanctum` middleware to ensure authenticated access
- Laravel Breeze handles user authentication and session management

### Frontend (Vue 3)
- Single Page Application structure using Composition API
- Axios for communication with backend API
- Vue Router for navigation between components (if extended)
- Form validation and API error handling included

### Authentication
- Session-based authentication with Laravel Sanctum
- API tokens managed via cookies
- Frontend makes authenticated API calls to protected backend routes

## 6. Development Environment

### Prerequisites
- Windows 11 with WSL2 and Ubuntu
- Docker Desktop installed and configured for WSL2
- Git and Composer installed in WSL2

### Setup Steps
1. Clone the Repository
2. Copy `.env.example` to `.env` and adjust database settings
3. Run `composer install`
4. Run `npm install`
5. Ensure Docker is running and start the PostgreSQL container
6. Run `php artisan migrate`
7. Run `npm run dev`

### PostgreSQL Management
PostgreSQL was managed using pgAdmin 4.

pgAdmin 4 was used to visualize the database schema, inspect tables, and verify migrations during development.

## 7. Future Enhancements
- Implement Role-Based Access Control Policies
- Add Search, Filtering, and Pagination to APIs
- Implement Notification System for Order Updates
- Export Purchase Orders to PDF
- Introduce Advanced Reporting and Forecasting Features

## 8. Conclusion
This design provides a clean, scalable foundation for Citruse's Purchase Order Management System. The architecture ensures maintainability and supports future enhancements as the business grows.