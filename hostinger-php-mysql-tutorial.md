# Complete Guide: Building a PHP/MySQL Web Application on Hostinger

## Table of Contents
1. [Hostinger Setup](#hostinger-setup)
2. [Project Structure](#project-structure)
3. [PHP/MySQL Implementation](#phpmysql-implementation)
4. [AI-Powered Cursor Workflow](#ai-powered-cursor-workflow)
5. [Deployment & Troubleshooting](#deployment--troubleshooting)

---

## 1. Hostinger Setup

### 1.1 Creating a Domain/Subdomain in hPanel

1. **Login to Hostinger hPanel**
   - Go to [hpanel.hostinger.com](https://hpanel.hostinger.com)
   - Enter your Hostinger account credentials

2. **Navigate to Domains**
   - In hPanel, click on **"Domains"** in the left sidebar
   - Click **"Manage"** next to your domain

3. **Create Subdomain (Optional)**
   - Click **"Subdomains"** tab
   - Enter subdomain name (e.g., `contact`)
   - Click **"Create"**
   - Your subdomain will be: `contact.yourdomain.com`

### 1.2 Creating MySQL Database

1. **Access Database Section**
   - In hPanel, click **"Hosting"** → **"Databases"**
   - Click **"MySQL Databases"**

2. **Create Database**
   - Enter database name (e.g., `contact_form_db`)
   - Click **"Create Database"**
   - Note down the database name: `yourusername_contact_form_db`

3. **Create Database User**
   - Scroll to **"MySQL Users"** section
   - Enter username (e.g., `contact_user`)
   - Set a strong password
   - Click **"Create User"**

4. **Assign User to Database**
   - Scroll to **"Add User to Database"** section
   - Select your database and user
   - Grant **ALL PRIVILEGES**
   - Click **"Add"**

### 1.3 PHP Configuration

1. **Access PHP Settings**
   - In hPanel, click **"Hosting"** → **"PHP Config"**
   - Select your domain/subdomain

2. **Set PHP Version**
   - Choose **PHP 8.1** or **8.2** (recommended)
   - Click **"Save"**

3. **Enable Extensions**
   - Ensure **mysqli** extension is enabled
   - Enable **error reporting** for development

### 1.4 File Manager Setup

1. **Access File Manager**
   - In hPanel, click **"Files"** → **"File Manager"**
   - Navigate to **`public_html/`** directory

2. **Create Project Folder**
   - Right-click → **"Create Folder"**
   - Name it `contact-form` (or your project name)

---

## 2. Project Structure

### 2.1 File Organization
```
public_html/
└── contact-form/
    ├── index.php          # Main contact form
    ├── style.css          # Styling
    ├── process-form.php   # Form processing
    ├── config.php         # Database configuration
    └── database.sql       # Database schema
```

### 2.2 Database Schema
```sql
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 3. PHP/MySQL Implementation

### 3.1 Database Configuration (`config.php`)
```php
<?php
// Hostinger MySQL Configuration
$host = 'localhost';
$dbname = 'yourusername_contact_form_db';  // Replace with your DB name
$username = 'yourusername_contact_user';   // Replace with your DB user
$password = 'your_strong_password';        // Replace with your DB password

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to utf8
mysqli_set_charset($conn, "utf8");
?>
```

### 3.2 Main Contact Form (`index.php`)
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form - Hostinger Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Contact Us</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        // Display success/error messages
                        if (isset($_GET['status'])) {
                            if ($_GET['status'] == 'success') {
                                echo '<div class="alert alert-success">Message sent successfully!</div>';
                            } elseif ($_GET['status'] == 'error') {
                                echo '<div class="alert alert-danger">Error sending message. Please try again.</div>';
                            }
                        }
                        ?>
                        
                        <form action="process-form.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

### 3.3 Form Processing (`process-form.php`)
```php
<?php
// Include database configuration
require_once 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize input data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?status=error");
        exit();
    }
    
    // Prepare SQL statement (prevent SQL injection)
    $sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);
        
        // Execute statement
        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php?status=success");
        } else {
            header("Location: index.php?status=error");
        }
        
        mysqli_stmt_close($stmt);
    } else {
        header("Location: index.php?status=error");
    }
    
} else {
    // Redirect if accessed directly
    header("Location: index.php");
}

mysqli_close($conn);
?>
```

### 3.4 Styling (`style.css`)
```css
body {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
}

.card {
    border: none;
    border-radius: 15px;
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
    background: linear-gradient(45deg, #007bff, #0056b3) !important;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn-primary {
    background: linear-gradient(45deg, #007bff, #0056b3);
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
}
```

---

## 4. AI-Powered Cursor Workflow

### 4.1 Code Generation Commands

**Generate Contact Form HTML with Bootstrap:**
```
[Ctrl+K] "Create a responsive contact form using Bootstrap 5 with proper validation and modern styling"
```

**Generate PHP Database Connection:**
```
[Ctrl+K] "Create a secure PHP database connection script for Hostinger MySQL with error handling and prepared statements"
```

**Generate Form Processing Logic:**
```
[Ctrl+K] "Write PHP code to process a contact form with input sanitization, email validation, and database insertion using prepared statements"
```

### 4.2 Debugging Commands

**Fix Connection Issues:**
```
[Ctrl+K] "Debug PHP MySQL connection timeout error on Hostinger - check credentials and connection parameters"
```

**Fix Access Denied Errors:**
```
[Ctrl+K] "Resolve MySQL access denied error - verify database user privileges and connection settings"
```

### 4.3 Optimization Commands

**Security Enhancement:**
```
[Ctrl+K] "Suggest secure password handling and input validation best practices for Hostinger PHP applications"
```

**Performance Optimization:**
```
[Ctrl+K] "Optimize PHP MySQL queries for better performance on Hostinger shared hosting"
```

---

## 5. Deployment & Troubleshooting

### 5.1 One-Click Deploy via File Manager

1. **Upload Files**
   - In File Manager, navigate to `public_html/contact-form/`
   - Click **"Upload"** button
   - Select all project files
   - Click **"Upload Files"**

2. **Set Permissions**
   - Right-click each file → **"Change Permissions"**
   - Set to **644** for files, **755** for directories

3. **Create Database Table**
   - In hPanel, go to **"Hosting"** → **"Databases"** → **"phpMyAdmin"**
   - Select your database
   - Click **"SQL"** tab
   - Paste the database schema and execute

### 5.2 Common Issues & Solutions

#### "Access Denied" Error
**Problem:** `Access denied for user 'username'@'localhost'`
**Solution:**
1. Verify database credentials in `config.php`
2. Check user privileges in hPanel → Databases
3. Ensure database name includes username prefix

#### PHP Version Mismatch
**Problem:** Code doesn't work due to PHP version
**Solution:**
1. Go to hPanel → Hosting → PHP Config
2. Select PHP 8.1 or 8.2
3. Save changes

#### Connection Timeout
**Problem:** Database connection times out
**Solution:**
1. Use `localhost` as hostname
2. Check if database is active in hPanel
3. Verify firewall settings

#### File Upload Issues
**Problem:** Files not uploading via File Manager
**Solution:**
1. Check file size limits
2. Use FTP if File Manager fails
3. Verify directory permissions

### 5.3 Testing Your Application

1. **Access Your Form**
   - Go to: `https://yourdomain.com/contact-form/`
   - Or: `https://contact.yourdomain.com/` (if using subdomain)

2. **Test Form Submission**
   - Fill out the form
   - Submit and check for success message
   - Verify data in phpMyAdmin

3. **Check Error Logs**
   - In hPanel → Files → Error Logs
   - Look for PHP errors or warnings

### 5.4 Security Best Practices

1. **Always use prepared statements** to prevent SQL injection
2. **Validate and sanitize all inputs** using `filter_var()`
3. **Use HTTPS** for production sites
4. **Regularly backup your database** via phpMyAdmin
5. **Keep PHP version updated** in hPanel
6. **Use strong database passwords**

---

## 6. Next Steps

### 6.1 Enhancements
- Add CAPTCHA protection
- Implement email notifications
- Create admin panel to view messages
- Add file upload functionality
- Implement AJAX form submission

### 6.2 Advanced Features
- User authentication system
- Blog/CMS functionality
- E-commerce integration
- API development
- Mobile app backend

### 6.3 Resources
- [Hostinger Knowledge Base](https://www.hostinger.com/help)
- [PHP Documentation](https://www.php.net/docs.php)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [Bootstrap Documentation](https://getbootstrap.com/docs/)

---

**Congratulations!** You've successfully built a PHP/MySQL web application on Hostinger. This foundation can be expanded into any type of web application you can imagine.

Remember to:
- Test thoroughly before going live
- Keep backups of your database
- Monitor your application's performance
- Stay updated with security best practices 