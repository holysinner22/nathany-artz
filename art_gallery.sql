-- Create the database
CREATE DATABASE IF NOT EXISTS art_gallery;
USE art_gallery;

-- Create the paintings table with all new fields
CREATE TABLE paintings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    image_url VARCHAR(255) NOT NULL,
    whatsapp_number VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Optional sample data
INSERT INTO paintings (title, artist, description, price, image_url, whatsapp_number)
VALUES
('Sunset Glow', 'Eugen Arthur', 'A vibrant sunset landscape.', 150000.00, 'uploads/sunset.jpg', '+255712345678'),
('Abstract Flow', 'John Deo', 'Abstract painting with deep emotion.', 200000.00, 'uploads/abstract.jpg', '+255789123456');
