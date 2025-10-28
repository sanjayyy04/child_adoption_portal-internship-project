CREATE DATABASE
IF NOT EXISTS adoption_db;
USE adoption_db;

CREATE TABLE
IF NOT EXISTS children
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR
(100) NOT NULL,
    age INT,
    gender VARCHAR
(10),
    health_status TEXT,
    photo VARCHAR
(255),
    status VARCHAR
(50) DEFAULT 'Available'
);

CREATE TABLE
IF NOT EXISTS adoption_inquiries
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    adopter_name VARCHAR
(100),
    contact_info VARCHAR
(100),
    preferred_child VARCHAR
(100),
    message TEXT,
    status VARCHAR
(50) DEFAULT 'Pending',
    appointment_date DATE
);

CREATE TABLE
IF NOT EXISTS adopted_children
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    child_id INT,
    adopter_name VARCHAR
(100),
    contact_info VARCHAR
(100),
    child_name VARCHAR
(100),
    child_age INT,
    child_gender VARCHAR
(10),
    child_health TEXT,
    child_photo VARCHAR
(255),
    adoption_date DATE,
    message TEXT
);
