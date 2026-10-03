CREATE DATABASE IF NOT EXISTS pos_system CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE pos_system;

CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    avatar VARCHAR(255) NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
('Juan Dela Cruz', 'juan@example.com', '09171234567', NOW()),
('Maria Santos', 'maria@example.com', '09181234567', NOW()),
('Pedro Reyes', 'pedro@example.com', '09191234567', NOW()),
('Anna Garcia', 'anna@example.com', '09201234567', NOW()),
('Carlo Mendoza', 'carlo@example.com', '09211234567', NOW());

INSERT INTO users (username, password, full_name, created_at) VALUES
('admin01', '$2y$10$cAXBw2WYnE9fCq/j4VO6Dus/Lm/AnruzG0RXi1qqBVgOBgEUWYYMW', 'Gabriel Santos', NOW()),
('cashier01', '$2y$10$cAXBw2WYnE9fCq/j4VO6Dus/Lm/AnruzG0RXi1qqBVgOBgEUWYYMW', 'Angela Reyes', NOW()),
('cashier02', '$2y$10$cAXBw2WYnE9fCq/j4VO6Dus/Lm/AnruzG0RXi1qqBVgOBgEUWYYMW', 'Mark Dela Cruz', NOW()),
('staff01', '$2y$10$cAXBw2WYnE9fCq/j4VO6Dus/Lm/AnruzG0RXi1qqBVgOBgEUWYYMW', 'Nicole Garcia', NOW()),
('manager01', '$2y$10$cAXBw2WYnE9fCq/j4VO6Dus/Lm/AnruzG0RXi1qqBVgOBgEUWYYMW', 'John Mendoza', NOW());
