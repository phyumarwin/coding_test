# Company and Employee Management System

## Project Overview
This application allows administrators to manage companies and employees efficiently. It includes features for creating, reading, updating, and deleting (CRUD) both companies and employees.

### Technologies Used
- Laravel
- PHP
- MySQL
- Bootstrap

## Installation
- php artisan breeze:install blade
- npm install 

### Requirements
- PHP
- Composer
- xampp

### Clone the Repository
```bash
git clone https://github.com/phyumarwin/coding_test
cd coding_test


## Run Migrations
php artisan migrate

##Run Seeders
php artisan db:seed

###Serve the Application
php artisan serve

## Code Structure
- app/Models: Contains the Company and Employee models.
- resources/views: Contains all Blade views for the application.
- routes/web.php: Defines the application routes.

## CRUD Operations
- Creating a Company: Navigate to the "Add Company" page and fill out the form.
- Viewing Companies: View the list of companies on the "Company List" page.
- Editing a Company: Click the edit button next to a company to modify its details.
- Deleting a Company: Click the delete button next to a company to remove it.
- Repeated for Employee