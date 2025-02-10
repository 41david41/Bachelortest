
-- Step 1: Create the database
CREATE DATABASE projectDB;

-- Step 2: Use the database
USE projectDB;

-- Step 3: Create a table for storing user information
CREATE TABLE purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    address VARCHAR(255),
    postcode VARCHAR(10),
    date_purchased DATE
);

-- Step 4: Insert fake data for three personas
INSERT INTO purchases (name, address, postcode, date_purchased) VALUES
('John Doe', '123 Elm Street, Springfield', 'SP1 2AB', '2024-06-15'),
('Jane Smith', '456 Oak Avenue, Rivertown', 'RT3 4CD', '2024-07-20'),
('Alice Brown', '789 Maple Road, Lakeview', 'LV5 6EF', '2024-08-10');

-- Step 5: Verify the data
SELECT * FROM purchases;

