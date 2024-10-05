

# Bus Management System

A web-based **Bus Management System** that allows administrators to manage bus schedules and users to book, view, and cancel bus tickets. The system includes user authentication, bus schedule management, and booking functionality.

## Features

- **User Registration and Login**: Users can sign up and log into the system.
- **Bus Schedule Management**: Admins can add, edit, and delete bus schedules.
- **Bus Booking**: Users can book available buses based on schedule.
- **Booking Management**: Users can view and cancel their bookings.
- **Admin Dashboard**: Administrators can oversee user bookings, bus schedules, and manage the entire system.

## Tech Stack

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL

## Project Structure

```plaintext
bus_management_system/
├── assets/
│   ├── css/
│   │   └── styles.css         # Stylesheet for the web app
│   ├── js/
│   │   └── scripts.js         # JavaScript functionality
├── config/
│   └── db.php                 # Database connection setup
├── includes/
│   ├── header.php             # Header included in all pages
│   ├── footer.php             # Footer included in all pages
│   └── functions.php          # Reusable PHP functions
├── pages/
│   ├── index.php              # Homepage
│   ├── login.php              # User login page
│   ├── register.php           # User registration page
│   ├── dashboard.php          # Admin dashboard
│   ├── book_bus.php           # Bus booking page
│   ├── cancel_booking.php      # Cancel booking page
│   ├── view_bookings.php       # View user bookings
│   ├── manage_schedules.php    # Admin page to manage bus schedules
│   ├── view_schedules.php      # User page to view bus schedules
│   └── logout.php             # Logout functionality
├── sql/
│   ├── schema.sql             # Database schema file
│   └── seed.sql               # Sample data for testing
└── .htaccess                  # Apache server configuration
```

## Setup Instructions

To get the project up and running, follow these steps:

### Prerequisites

- **XAMPP** (or any web server with PHP and MySQL support)
- **Git** (to clone the repository)
- **MySQL** (or any compatible database server)

### Step 1: Clone the Repository

Open your terminal or Git Bash, and run the following command to clone the repository from GitHub:

```bash
git clone https://github.com/Perivo/bus_management_system.git
```

Alternatively, download the repository as a ZIP and extract it into your working directory.

### Step 2: Set Up the Web Server

1. Install [XAMPP](https://www.apachefriends.org/index.html) (if you haven't already).
2. Copy the `bus_management_system` folder to your web server directory:
   - For **XAMPP**, move the folder to `C:/xampp/htdocs/`.
   
   After this, the full path should be something like `C:/xampp/htdocs/bus_management_system`.

### Step 3: Set Up the Database

1. Start **Apache** and **MySQL** from the XAMPP Control Panel.
2. Open your browser and go to `http://localhost/phpmyadmin` to access **phpMyAdmin**.
3. Create a new database:
   - Name: `bus_management_db` (or any name of your choice).
4. Import the database schema:
   - In **phpMyAdmin**, select the newly created database.
   - Go to the "Import" tab and choose the `sql/schema.sql` file located in the `sql/` directory of the project.
   - Click **Go** to import the schema.
5. (Optional) Import sample data:
   - In the same database, you can also import `sql/seed.sql` to load some initial data for testing.

### Step 4: Configure the Database Connection

1. Navigate to the `config/db.php` file in your project.
2. Edit the database connection parameters to match your MySQL setup:

```php
<?php
$host = 'localhost';        // Usually localhost
$dbname = 'bus_management_db';  // The name of the database you created
$username = 'root';         // Your MySQL username (usually root)
$password = '';             // Your MySQL password (empty by default in XAMPP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
```

3. Save the changes to `db.php`.

### Step 5: Run the Application

1. Open your browser and navigate to `http://localhost/bus_management_system`.
2. You should now be able to access the homepage of the Bus Management System.

## Admin Credentials

To log in as an administrator, use the following credentials:

- **Username**: `admin`
- **Password**: `admin`

Once logged in, you will have access to the admin dashboard where you can manage bus schedules and oversee user bookings.

## Features Overview

### User Features

- **User Registration**: Users can sign up for a new account.
- **Bus Booking**: Users can book a seat for a bus from the available schedules.
- **View Bookings**: Users can view their current and past bookings.
- **Cancel Booking**: Users can cancel a booking.

### Admin Features

- **Manage Bus Schedules**: Admins can add, edit, or delete bus schedules.
- **View All Bookings**: Admins can view all user bookings.
- **Admin Dashboard**: Centralized admin panel for managing the system.

## Database Structure

The database consists of the following tables:

- **users**: Stores user information (username, password, role).
- **bus_schedules**: Stores bus schedule details (route, date, time).
- **bookings**: Stores user booking details.

### Sample Database Schema (`schema.sql`)

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);

CREATE TABLE bus_schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    route VARCHAR(100) NOT NULL,
    departure_time TIME NOT NULL,
    departure_date DATE NOT NULL,
    available_seats INT NOT NULL
);

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    schedule_id INT NOT NULL,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (schedule_id) REFERENCES bus_schedules(id)
);
```

## Screenshots

*(You can add relevant screenshots of the application here, such as the home page, booking page, admin dashboard, etc.)*

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## Troubleshooting

### Common Issues:

1. **Cannot connect to database**: Double-check your database credentials in `config/db.php`. Make sure your MySQL server is running and the database exists.
2. **404 Not Found**: Ensure that the project is placed correctly in your web server's root directory (for XAMPP, `htdocs`).
