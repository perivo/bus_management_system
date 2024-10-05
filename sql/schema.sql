-- Drop existing tables if they exist
DROP TABLE IF EXISTS bookings;
DROP TABLE IF EXISTS bus_schedule;
DROP TABLE IF EXISTS users;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bus Schedule table
CREATE TABLE bus_schedule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    departure VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL,
    destination VARCHAR(100) NOT NULL,
    time TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Bookings table
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    bus_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (bus_id) REFERENCES bus_schedule(id) ON DELETE CASCADE
);
