# POS System - Formative Assessment 1 (IT0049)

A basic 4-page Point-of-Sale (POS) system built using CodeIgniter 4, demonstrating routing, controllers, and views following the MVC pattern.

**Student:** Janina Charisse Torre
**Section:** DC31
**Professor:** Mr. Rene Christoper Tio

## Pages

| Page | Route | Description |
|---|---|---|
| Landing | `/` | Home page |
| About | `/about` | About the project |
| Customer Accounts | `/customers` | List of customers (static array) |
| User Accounts | `/users` | List of users/staff (static array) |

## Live Hostings 

- http://janinapos.free.je
- http://janinapos.free.je/about
- http://janinapos.free.je/customers
- http://janinapos.free.je/users

## Requirements

- PHP 8.1 or higher
- Composer
- A local server (XAMPP, or PHP's built-in server)

## Setup Instructions

1. Clone this repository using `git clone https://github.com/jxninxtorre/Web-System-And-Technologies-TSA-1.git`
2. Navigate into the project folder using `cd Web-System-And-Technologies-TSA-1`
3. Install dependencies using `composer install`
4. Copy the environment file: `copy env .env`
5. In the `.env` file, set `CI_ENVIRONMENT = development`
6. Start the development server: `php spark serve`
7. Open your browser to `http://localhost:8080/` (or whichever port is shown in the terminal)

## Tech Stack

- CodeIgniter 4
- PHP 8.2
- Static PHP arrays as temporary data source (no database yet)
