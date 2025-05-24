CREATE DATABASE hotel_reservation_system;
USE hotel_reservation_system;
CREATE TABLE admin (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(40) NOT NULL,
    lname VARCHAR(40) NOT NULL,
    email VARCHAR(40) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(10),
    residence VARCHAR(40)
);

CREATE TABLE customers (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(40) NOT NULL,
    lname VARCHAR(40) NOT NULL,
    email VARCHAR(40) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(10),
    country VARCHAR(40),
    physical_address VARCHAR(100),
    dob DATE,
    sex VARCHAR(5)
);

CREATE TABLE rooms (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(10) UNIQUE NOT NULL,
    class_id VARCHAR(40) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    status ENUM('Available', 'Booked') DEFAULT 'Available'
);

CREATE TABLE reservations (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    customer_id INT(10),
    room_id INT(10),
    res_date DATE,
    status ENUM('Pending', 'Confirmed', 'Cancelled') DEFAULT 'Pending',
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (room_id) REFERENCES rooms(id)
);

CREATE TABLE payments (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT(10),
    amount DECIMAL(10,2) NOT NULL,
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    payment_status ENUM('Pending', 'Completed', 'Failed') DEFAULT 'Pending',
    FOREIGN KEY (reservation_id) REFERENCES reservations(id)
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);