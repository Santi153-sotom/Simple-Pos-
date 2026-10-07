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
    password VARCHAR(255) NOT NULL,
    created_at DATETIME,
    updated_at DATETIME
);

INSERT INTO customers (full_name, email, phone) VALUES
('Andrea Santos', 'andrea.santos@gmail.com', '0917-123-4501'),
('Benjie Cruz', 'benjie.cruz@gmail.com', '0918-234-5602'),
('Carla Reyes', 'carla.reyes@gmail.com', '0919-345-6703'),
('Daniel Garcia', 'daniel.garcia@gmail.com', '0920-456-7804'),
('Ella Mendoza', 'ella.mendoza@gmail.com', '0921-567-8905');

-- All sample users use the starter password Pos12345! (stored only as a hash).
INSERT INTO users (username, full_name, role, password) VALUES
('admin01', 'Alex Ramirez', 'Administrator', '$2b$12$gdYv/RueAQOuiVpDOn/OFuDnVrjwD3.fBL0L.Hv7pc6trZrPU6bMK'),
('manager01', 'Bianca Flores', 'Manager', '$2b$12$gdYv/RueAQOuiVpDOn/OFuDnVrjwD3.fBL0L.Hv7pc6trZrPU6bMK'),
('cashier01', 'Carlo Lim', 'Cashier', '$2b$12$gdYv/RueAQOuiVpDOn/OFuDnVrjwD3.fBL0L.Hv7pc6trZrPU6bMK'),
('cashier02', 'Diana Aquino', 'Cashier', '$2b$12$gdYv/RueAQOuiVpDOn/OFuDnVrjwD3.fBL0L.Hv7pc6trZrPU6bMK'),
('stock01', 'Enzo Villanueva', 'Inventory Staff', '$2b$12$gdYv/RueAQOuiVpDOn/OFuDnVrjwD3.fBL0L.Hv7pc6trZrPU6bMK');
