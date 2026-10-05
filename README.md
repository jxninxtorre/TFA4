# TFA4 - POS Application with Authentication

A CodeIgniter 4 web application for managing Customer and User Accounts, now protected by a login system. Only logged-in users can manage customer and user accounts.

> Course: Web Systems and Technologies
> Author: *(your name and section)*

---

## Features

- **Authentication**
  - Login page that verifies the username and password with `password_verify()`
  - Passwords are stored as hashes created with `password_hash()`
  - Session started on successful login, destroyed on logout
  - Custom `AuthFilter` that redirects logged-out visitors to the login page
- **Customer Accounts**: view, create, and edit customers
- **User Accounts**: view, create, and edit users, with avatar uploads (JPG/PNG, max 2MB, auto-resized thumbnails)
- **Redesigned UI**: peach theme, topbar with active-page highlight, user chip and logout button in the upper right

---

## Tech Stack

- CodeIgniter 4
- PHP 8.x
- MySQL / MariaDB
- XAMPP (Apache)
- GD Library (image processing)

---

## Getting Started

### Prerequisites

- [XAMPP](https://www.apachefriends.org/) (PHP 8.x and MySQL)
- [Composer](https://getcomposer.org/)

### Installation

1. **Clone the repository** into your XAMPP `htdocs` folder

```
   cd C:\xampp\htdocs
   git clone https://github.com/jxninxtorre/TFA4.git
   cd TFA4
```

2. **Install dependencies**

```
   composer install
```

3. **Create the environment file**

   Copy `env` to `.env`, then set the base URL and database:

```
   app.baseURL = 'http://localhost/TFA4/'

   database.default.hostname = localhost
   database.default.database = pos_db_tfa4
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
```

4. **Create the database**

   - Start Apache and MySQL in XAMPP.
   - Open phpMyAdmin, create a database named `pos_db_tfa4`.
   - Import `pos_db_tfa4.sql` into it.

5. **Set the passwords of the existing users**

   The `users` table has a `password` column. If the imported passwords are empty, set a hashed password for every user:

```
   php spark auth:hash-passwords YourChosenPassword
```

6. **Run the app**

   Open `http://localhost/TFA4/index.php/` in your browser.

---

## Routes

| Route | Access | Description |
|---|---|---|
| `/` | Public | Home page |
| `/about` | Public | About page |
| `/login` | Public | Login page |
| `/logout` | Public | Destroys the session, redirects to login |
| `/customers`, `/customers/new`, `/customers/edit/{id}` | **Login required** | Customer Accounts |
| `/users`, `/users/new`, `/users/edit/{id}` | **Login required** | User Accounts |

---

## How Authentication Works

1. The user submits the login form (`Auth::attempt`).
2. The app finds the user by username and checks the password with `password_verify()` against the stored hash.
3. On success, the session is regenerated and `isLoggedIn`, `user_id`, `username`, and `full_name` are saved in the session.
4. `AuthFilter` runs before every protected route. If `isLoggedIn` is not set, the visitor is redirected to `/login`.
5. `Auth::logout` destroys the session and redirects to `/login`.

### Files added or changed

```
app/
├── Commands/HashPasswords.php   # spark command that hashes users' passwords
├── Controllers/Auth.php         # login, attempt, logout
├── Filters/AuthFilter.php       # blocks logged-out visitors
├── Config/Filters.php           # registers the "auth" filter alias
├── Config/Routes.php            # protected route group
└── Views/
    ├── auth/login.php           # login page
    ├── header.php               # global styles
    └── menu.php                 # topbar with logout button
pos_db_tfa4.sql                  # database dump
```

---

## Access Control Testing

| Test | Expected result |
|---|---|
| Visit a protected page (e.g. `/customers`) while logged out | Redirected to `/login` with "Please log in first." |
| Log in with a wrong password | "Invalid username or password." |
| Log in with a correct password | Redirected to the page you requested |
| Visit protected pages while logged in | Page loads normally |
| Click **Logout**, then visit a protected page | Redirected to `/login` again |

---

## Screenshots

*(Add your screenshots here, for example:)*

```
![Login page](docs/login.png)
![User Accounts](docs/users.png)
```

---

## License

MIT
