CREATE TABLE walmart_inventory (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    category VARCHAR(50),
    price DECIMAL(10,2),
    stock_quantity INT,
    supplier VARCHAR(100),
    date_added DATE
);

INSERT INTO walmart_inventory (name, category, price, stock_quantity, supplier, date_added) VALUES
('iPhone 14', 'Electronics', 999.00, 25, 'Apple Inc.', '2025-06-01'),
('T-shirt', 'Apparel', 19.99, 100, 'Hanes Co.', '2025-06-02'),
('Microwave', 'Appliances', 79.50, 15, 'LG Electronics', '2025-06-03'),
('Desk Chair', 'Furniture', 129.99, 8, 'Staples', '2025-06-04'),
('LED TV 50"', 'Electronics', 499.99, 5, 'Samsung', '2025-06-05');