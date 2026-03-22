-- Fix businesses table: Drop if exists, recreate without problematic FK first, then add
-- Run in phpMyAdmin for jci_zone12 database

USE jci_zone12;

-- Step 1: Drop if exists (safe)
DROP TABLE IF EXISTS businesses;

-- Step 2: Create without FK constraint first
CREATE TABLE businesses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    business_name VARCHAR(150) NOT NULL,
    owner_name VARCHAR(100) NOT NULL,
    owner_jci_name VARCHAR(100) NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    website VARCHAR(200) NULL,
    address TEXT NULL,
    city VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    description TEXT NULL,
    tags VARCHAR(255) NULL,
    status ENUM('active', 'pending', 'inactive') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Step 3: Verify users table exists and engine matches (InnoDB)
SHOW CREATE TABLE users;

-- Step 4: Add FK constraint (InnoDB required)
ALTER TABLE businesses 
ADD CONSTRAINT fk_businesses_user 
FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL;

-- Step 5: Sample data
INSERT INTO businesses (user_id, business_name, owner_name, owner_jci_name, email, phone, website, address, city, category, description, tags, status) VALUES
(1, 'JCI Consulting Services', 'John Doe', 'John Doe PPM', 'john@jci.com', '+1-555-0101', 'https://jci-consulting.com', '123 Main St', 'New York', 'Services', 'Leadership training for JCI members', 'consulting,training,leadership', 'active'),
(1, 'Tech Innovators Inc', 'Jane Smith', 'Jane Smith LOM', 'jane@tech.com', '+1-555-0202', 'https://techinnovators.com', '456 Oak Ave', 'Los Angeles', 'Products', 'Software solutions for SMEs', 'software,tech,startup', 'active'),
(NULL, 'Green Energy Solutions', 'Mike Johnson', NULL, 'mike@greenenergy.com', '+1-555-0303', NULL, '789 Pine Rd', 'Chicago', 'Service Provider', 'Renewable energy installations', 'solar,renewable,energy', 'active');

-- Verify
SELECT COUNT(*) as business_count FROM businesses;
SELECT * FROM businesses LIMIT 5;

