PRAGMA foreign_keys = ON;

CREATE TABLE customers (
    customer_id INTEGER PRIMARY KEY AUTOINCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    phone VARCHAR(20),
    created_at DATETIME,
    updated_at DATETIME
);

CREATE TABLE users (
    user_id INTEGER PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    role VARCHAR(50) NOT NULL,
    avatar VARCHAR(255),
    created_at DATETIME,
    updated_at DATETIME
);

INSERT INTO customers (full_name, email, phone) VALUES
('Andrea Santos', 'andrea.santos@gmail.com', '0917-123-4501'),
('Benjie Cruz', 'benjie.cruz@gmail.com', '0918-234-5602'),
('Carla Reyes', 'carla.reyes@gmail.com', '0919-345-6703'),
('Daniel Garcia', 'daniel.garcia@gmail.com', '0920-456-7804'),
('Ella Mendoza', 'ella.mendoza@gmail.com', '0921-567-8905');

INSERT INTO users (username, full_name, role) VALUES
('admin01', 'Alex Ramirez', 'Administrator'),
('manager01', 'Bianca Flores', 'Manager'),
('cashier01', 'Carlo Lim', 'Cashier'),
('cashier02', 'Diana Aquino', 'Cashier'),
('stock01', 'Enzo Villanueva', 'Inventory Staff');
