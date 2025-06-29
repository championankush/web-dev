-- Hostinger PHP/MySQL Contact Form Database Schema
-- Execute this in phpMyAdmin or MySQL command line

-- Create the contact_messages table
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_email (email),
    INDEX idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Optional: Insert sample data for testing
INSERT INTO contact_messages (name, email, message) VALUES 
('John Doe', 'john@example.com', 'This is a test message to verify the contact form is working properly.'),
('Jane Smith', 'jane@example.com', 'Great tutorial! The form looks amazing and works perfectly.'),
('Mike Johnson', 'mike@example.com', 'Thank you for creating this comprehensive guide for Hostinger users.');

-- Optional: Create additional tables for future enhancements

-- Users table for admin panel (future enhancement)
-- CREATE TABLE users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(50) UNIQUE NOT NULL,
--     email VARCHAR(255) UNIQUE NOT NULL,
--     password_hash VARCHAR(255) NOT NULL,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     last_login TIMESTAMP NULL,
--     is_active BOOLEAN DEFAULT TRUE
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Settings table for configuration (future enhancement)
-- CREATE TABLE settings (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     setting_key VARCHAR(100) UNIQUE NOT NULL,
--     setting_value TEXT,
--     description VARCHAR(255),
--     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default settings (future enhancement)
-- INSERT INTO settings (setting_key, setting_value, description) VALUES
-- ('site_name', 'Contact Form', 'Website name'),
-- ('admin_email', 'admin@yourdomain.com', 'Admin email for notifications'),
-- ('max_message_length', '1000', 'Maximum allowed message length'),
-- ('enable_captcha', 'false', 'Enable CAPTCHA protection');

-- Show table structure
DESCRIBE contact_messages;

-- Show sample data
SELECT * FROM contact_messages ORDER BY created_at DESC LIMIT 5; 