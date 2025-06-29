# PHP Backend Development Tutorial
## Complete Guide for Hostinger Shared Hosting

**Navigation:** [← Previous: JavaScript Basics](03-javascript-basics.md) | [Next: MySQL Database Design →](05-mysql-database-design.md)

---

## 📚 Table of Contents

1. [Introduction to PHP Backend Development](#introduction-to-php-backend-development)
2. [Setting Up PHP on Hostinger](#setting-up-php-on-hostinger)
3. [PHP Fundamentals](#php-fundamentals)
4. [Working with Forms](#working-with-forms)
5. [File Handling](#file-handling)
6. [Sessions and Cookies](#sessions-and-cookies)
7. [Database Connectivity](#database-connectivity)
8. [Security Best Practices](#security-best-practices)
9. [Error Handling and Logging](#error-handling-and-logging)
10. [Performance Optimization](#performance-optimization)
11. [Advanced PHP Features](#advanced-php-features)
12. [Practice Projects](#practice-projects)
13. [Hostinger-Specific Considerations](#hostinger-specific-considerations)
14. [Exercises and Challenges](#exercises-and-challenges)

---

## 1. Introduction to PHP Backend Development

### What is PHP?
PHP (Hypertext Preprocessor) is a server-side scripting language designed for web development. It's particularly well-suited for shared hosting environments like Hostinger.

### Why PHP for Hostinger?
- **Widely Supported**: PHP is available on virtually all shared hosting plans
- **Easy Setup**: No complex configuration required
- **Cost-Effective**: Works on budget-friendly hosting plans
- **Large Community**: Extensive documentation and support
- **Database Integration**: Excellent MySQL support

### How PHP Works on Hostinger
1. User requests a PHP page
2. Hostinger's server processes the PHP code
3. Server generates HTML output
4. HTML is sent to the user's browser

### Basic PHP Structure
```php
<?php
// PHP code goes here
echo "Hello, World!";
?>
```

---

## 2. Setting Up PHP on Hostinger

### Accessing PHP Configuration
1. **Login to hPanel**
   - Go to [hpanel.hostinger.com](https://hpanel.hostinger.com)
   - Enter your credentials

2. **Navigate to PHP Settings**
   - Click **"Hosting"** → **"PHP Config"**
   - Select your domain/subdomain

3. **Choose PHP Version**
   - Recommended: **PHP 8.1** or **8.2**
   - Click **"Save"**

### File Structure for Hostinger
```
public_html/
├── index.php          # Main entry point
├── config.php         # Database configuration
├── includes/          # PHP includes
│   ├── functions.php
│   └── database.php
├── assets/            # Static files
│   ├── css/
│   ├── js/
│   └── images/
└── uploads/           # User uploads
```

### Creating Your First PHP File
```php
<?php
// File: public_html/index.php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP Website</title>
</head>
<body>
    <h1><?php echo "Welcome to my PHP website!"; ?></h1>
    <p>Current time: <?php echo date('Y-m-d H:i:s'); ?></p>
</body>
</html>
?>
```

---

## 3. PHP Fundamentals

### Variables and Data Types
```php
<?php
// Variables
$name = "John Doe";
$age = 25;
$height = 5.9;
$isStudent = true;
$hobbies = ["reading", "coding", "gaming"];

// Constants
define("SITE_NAME", "My Website");
const MAX_USERS = 1000;

// Variable scope
$globalVar = "I'm global";

function testFunction() {
    global $globalVar; // Access global variable
    $localVar = "I'm local";
    echo $globalVar;
}
?>
```

### Control Structures
```php
<?php
// If statements
$age = 18;
if ($age >= 18) {
    echo "You are an adult";
} elseif ($age >= 13) {
    echo "You are a teenager";
} else {
    echo "You are a child";
}

// Switch statement
$day = "Monday";
switch ($day) {
    case "Monday":
        echo "Start of the week";
        break;
    case "Friday":
        echo "Weekend is coming!";
        break;
    default:
        echo "Regular day";
}

// Loops
for ($i = 0; $i < 5; $i++) {
    echo $i . "<br>";
}

$fruits = ["apple", "banana", "orange"];
foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}
?>
```

### Functions
```php
<?php
// Basic function
function greet($name) {
    return "Hello, " . $name . "!";
}

// Function with default parameters
function createUser($name, $email, $age = 18) {
    return [
        'name' => $name,
        'email' => $email,
        'age' => $age
    ];
}

// Anonymous function (closure)
$multiply = function($a, $b) {
    return $a * $b;
};

echo $multiply(5, 3); // 15
?>
```

---

## 4. Working with Forms

### Basic Form Processing
```php
<?php
// File: public_html/contact.php
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form data
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';
        
        // Basic validation
        if (empty($name) || empty($email) || empty($message)) {
            echo "<p style='color: red;'>All fields are required!</p>";
        } else {
            // Process the form (we'll add database storage later)
            echo "<p style='color: green;'>Thank you for your message!</p>";
        }
    }
    ?>
    
    <form method="POST" action="">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit">Send Message</button>
    </form>
</body>
</html>
?>
```

### Form Validation
```php
<?php
function validateForm($data) {
    $errors = [];
    
    // Validate name
    if (empty($data['name'])) {
        $errors['name'] = "Name is required";
    } elseif (strlen($data['name']) < 2) {
        $errors['name'] = "Name must be at least 2 characters";
    }
    
    // Validate email
    if (empty($data['email'])) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }
    
    // Validate message
    if (empty($data['message'])) {
        $errors['message'] = "Message is required";
    } elseif (strlen($data['message']) < 10) {
        $errors['message'] = "Message must be at least 10 characters";
    }
    
    return $errors;
}

// Usage
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = validateForm($_POST);
    
    if (empty($errors)) {
        // Process form
        echo "Form is valid!";
    } else {
        // Display errors
        foreach ($errors as $field => $error) {
            echo "<p style='color: red;'>$field: $error</p>";
        }
    }
}
?>
```

---

## 5. File Handling

### Reading and Writing Files
```php
<?php
// Writing to a file
$content = "Hello, this is some content!\n";
$filename = "data.txt";

// Write content
if (file_put_contents($filename, $content, FILE_APPEND | LOCK_EX)) {
    echo "Content written successfully";
} else {
    echo "Error writing to file";
}

// Reading from a file
if (file_exists($filename)) {
    $content = file_get_contents($filename);
    echo "<pre>$content</pre>";
}

// Reading file line by line
$handle = fopen($filename, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        echo $line . "<br>";
    }
    fclose($handle);
}
?>
```

### File Upload Handling
```php
<?php
// File: public_html/upload.php
<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    <h2>Upload File</h2>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
        $uploadDir = "uploads/";
        $uploadFile = $uploadDir . basename($_FILES["file"]["name"]);
        
        // Check if file is actually uploaded
        if (is_uploaded_file($_FILES["file"]["tmp_name"])) {
            // Check file size (5MB limit)
            if ($_FILES["file"]["size"] > 5 * 1024 * 1024) {
                echo "<p style='color: red;'>File is too large (max 5MB)</p>";
            } else {
                // Check file type
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
                $fileExtension = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
                
                if (in_array($fileExtension, $allowedTypes)) {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) {
                        echo "<p style='color: green;'>File uploaded successfully!</p>";
                    } else {
                        echo "<p style='color: red;'>Error uploading file</p>";
                    }
                } else {
                    echo "<p style='color: red;'>Invalid file type</p>";
                }
            }
        }
    }
    ?>
    
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
?>
```

---

## 6. Sessions and Cookies

### Session Management
```php
<?php
// Start session
session_start();

// Set session variables
$_SESSION['user_id'] = 123;
$_SESSION['username'] = 'john_doe';
$_SESSION['logged_in'] = true;

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

// Logout function
function logout() {
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

// Usage
if (isLoggedIn()) {
    echo "Welcome, " . $_SESSION['username'] . "!";
    echo "<a href='logout.php'>Logout</a>";
} else {
    echo "Please <a href='login.php'>login</a>";
}
?>
```

### Cookie Management
```php
<?php
// Set a cookie
setcookie("user_preference", "dark_theme", time() + (86400 * 30), "/"); // 30 days

// Read a cookie
if (isset($_COOKIE["user_preference"])) {
    $theme = $_COOKIE["user_preference"];
    echo "User prefers: $theme";
}

// Delete a cookie
setcookie("user_preference", "", time() - 3600, "/");
?>
```

### Login System Example
```php
<?php
// File: public_html/login.php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // In a real application, you'd check against a database
    if ($username === 'admin' && $password === 'password123') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    
    <form method="POST">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
?>
```

---

## 7. Database Connectivity

### MySQL Connection (Hostinger)
```php
<?php
// File: public_html/config/database.php
class Database {
    private $host = 'localhost';
    private $dbname = 'yourusername_database';
    private $username = 'yourusername_user';
    private $password = 'your_password';
    private $conn;
    
    public function connect() {
        try {
            $this->conn = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname;charset=utf8",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
            return $this->conn;
        } catch (PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage());
            return false;
        }
    }
    
    public function getConnection() {
        return $this->conn;
    }
}
?>
```

### Basic CRUD Operations
```php
<?php
// File: public_html/includes/user_functions.php
require_once 'config/database.php';

class UserManager {
    private $db;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }
    
    // Create
    public function createUser($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (name, email, password, created_at) 
                VALUES (:name, :email, :password, NOW())";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':password' => $hashedPassword
            ]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error creating user: " . $e->getMessage());
            return false;
        }
    }
    
    // Read
    public function getUserById($id) {
        $sql = "SELECT id, name, email, created_at FROM users WHERE id = :id";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Error fetching user: " . $e->getMessage());
            return false;
        }
    }
    
    // Update
    public function updateUser($id, $name, $email) {
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        
        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                ':id' => $id,
                ':name' => $name,
                ':email' => $email
            ]);
        } catch (PDOException $e) {
            error_log("Error updating user: " . $e->getMessage());
            return false;
        }
    }
    
    // Delete
    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        
        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log("Error deleting user: " . $e->getMessage());
            return false;
        }
    }
    
    // List all users
    public function getAllUsers() {
        $sql = "SELECT id, name, email, created_at FROM users ORDER BY created_at DESC";
        
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching users: " . $e->getMessage());
            return [];
        }
    }
}
?>
```

---

## 8. Security Best Practices

### Input Sanitization and Validation
```php
<?php
// Sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Validate email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Validate and sanitize form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    
    if (!validateEmail($email)) {
        $errors[] = "Invalid email format";
    }
}
?>
```

### SQL Injection Prevention
```php
<?php
// Always use prepared statements
$sql = "SELECT * FROM users WHERE email = :email AND status = :status";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':email' => $email,
    ':status' => 'active'
]);
$user = $stmt->fetch();

// Never do this (vulnerable to SQL injection):
// $sql = "SELECT * FROM users WHERE email = '$email'";
?>
```

### XSS Prevention
```php
<?php
// Always escape output
echo htmlspecialchars($userInput, ENT_QUOTES, 'UTF-8');

// For JSON output
header('Content-Type: application/json');
echo json_encode($data);
?>
```

### CSRF Protection
```php
<?php
// Generate CSRF token
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Verify CSRF token
function verifyCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// In forms
<form method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
    <!-- form fields -->
</form>

// In form processing
if (!verifyCSRFToken($_POST['csrf_token'] ?? '')) {
    die('CSRF token validation failed');
}
?>
```

---

## 9. Error Handling and Logging

### Error Handling
```php
<?php
// Set error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// For production, log errors instead of displaying them
// error_reporting(0);
// ini_set('display_errors', 0);
// ini_set('log_errors', 1);
// ini_set('error_log', '/path/to/error.log');

// Custom error handler
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    $errorMessage = date('Y-m-d H:i:s') . " Error: [$errno] $errstr in $errfile on line $errline\n";
    error_log($errorMessage, 3, 'error.log');
    
    if (ini_get('display_errors')) {
        echo "<div style='color: red;'>An error occurred. Please try again later.</div>";
    }
    
    return true;
}

set_error_handler("customErrorHandler");

// Exception handling
try {
    $result = someFunction();
} catch (Exception $e) {
    error_log("Exception: " . $e->getMessage());
    echo "An error occurred. Please try again later.";
}
?>
```

### Logging System
```php
<?php
class Logger {
    private $logFile;
    
    public function __construct($logFile = 'app.log') {
        $this->logFile = $logFile;
    }
    
    public function log($level, $message, $context = []) {
        $timestamp = date('Y-m-d H:i:s');
        $contextStr = !empty($context) ? ' ' . json_encode($context) : '';
        $logEntry = "[$timestamp] [$level] $message$contextStr\n";
        
        file_put_contents($this->logFile, $logEntry, FILE_APPEND | LOCK_EX);
    }
    
    public function info($message, $context = []) {
        $this->log('INFO', $message, $context);
    }
    
    public function error($message, $context = []) {
        $this->log('ERROR', $message, $context);
    }
    
    public function debug($message, $context = []) {
        $this->log('DEBUG', $message, $context);
    }
}

// Usage
$logger = new Logger();
$logger->info('User logged in', ['user_id' => 123, 'ip' => $_SERVER['REMOTE_ADDR']]);
?>
```

---

## 10. Performance Optimization

### Database Optimization
```php
<?php
// Use indexes on frequently queried columns
// SELECT * FROM users WHERE email = ? (email should be indexed)

// Limit results
$sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 10";

// Use pagination
$page = $_GET['page'] ?? 1;
$limit = 10;
$offset = ($page - 1) * $limit;
$sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $limit OFFSET $offset";

// Cache frequently accessed data
function getCachedData($key, $callback, $ttl = 3600) {
    $cacheFile = "cache/" . md5($key) . ".cache";
    
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $ttl) {
        return unserialize(file_get_contents($cacheFile));
    }
    
    $data = $callback();
    file_put_contents($cacheFile, serialize($data));
    return $data;
}
?>
```

### Code Optimization
```php
<?php
// Use require_once instead of include for important files
require_once 'config/database.php';

// Minimize database queries
// Instead of multiple queries in a loop, use JOIN or IN clauses

// Use appropriate data types
$userId = (int)$_GET['id']; // Cast to integer

// Avoid unnecessary variables
// Instead of: $result = someFunction(); return $result;
// Use: return someFunction();
?>
```

---

## 11. Advanced PHP Features

### Object-Oriented Programming
```php
<?php
class User {
    private $id;
    private $name;
    private $email;
    
    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function save() {
        // Database save logic
        $db = new Database();
        $conn = $db->connect();
        
        $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email
        ]);
    }
}

// Usage
$user = new User("John Doe", "john@example.com");
$user->save();
?>
```

### Namespaces and Autoloading
```php
<?php
// File: public_html/classes/User.php
namespace App\Models;

class User {
    // User class implementation
}

// File: public_html/autoload.php
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/classes/';
    
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    if (file_exists($file)) {
        require $file;
    }
});

// Usage
require_once 'autoload.php';
use App\Models\User;
$user = new User();
?>
```

---

## 12. Practice Projects

### Project 1: User Management System
```php
<?php
// File: public_html/users/index.php
session_start();
require_once '../includes/user_functions.php';

$userManager = new UserManager();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'create':
                $userManager->createUser($_POST['name'], $_POST['email'], $_POST['password']);
                break;
            case 'update':
                $userManager->updateUser($_POST['id'], $_POST['name'], $_POST['email']);
                break;
            case 'delete':
                $userManager->deleteUser($_POST['id']);
                break;
        }
    }
}

$users = $userManager->getAllUsers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
</head>
<body>
    <h1>User Management System</h1>
    
    <!-- Add User Form -->
    <h2>Add New User</h2>
    <form method="POST">
        <input type="hidden" name="action" value="create">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Add User</button>
    </form>
    
    <!-- Users List -->
    <h2>Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['created_at']); ?></td>
            <td>
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
?>
```

### Project 2: File Upload System
```php
<?php
// File: public_html/upload-system/index.php
session_start();

class FileUploader {
    private $uploadDir;
    private $maxFileSize;
    private $allowedTypes;
    
    public function __construct($uploadDir = 'uploads/', $maxFileSize = 5242880) {
        $this->uploadDir = $uploadDir;
        $this->maxFileSize = $maxFileSize; // 5MB
        $this->allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx'];
        
        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0755, true);
        }
    }
    
    public function upload($file) {
        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            return ['success' => false, 'message' => 'No file uploaded'];
        }
        
        if ($file['size'] > $this->maxFileSize) {
            return ['success' => false, 'message' => 'File too large'];
        }
        
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $this->allowedTypes)) {
            return ['success' => false, 'message' => 'File type not allowed'];
        }
        
        $fileName = uniqid() . '.' . $fileExtension;
        $filePath = $this->uploadDir . $fileName;
        
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return ['success' => true, 'fileName' => $fileName, 'originalName' => $file['name']];
        } else {
            return ['success' => false, 'message' => 'Upload failed'];
        }
    }
    
    public function getUploadedFiles() {
        $files = [];
        if (is_dir($this->uploadDir)) {
            $fileList = scandir($this->uploadDir);
            foreach ($fileList as $file) {
                if ($file != '.' && $file != '..') {
                    $files[] = [
                        'name' => $file,
                        'size' => filesize($this->uploadDir . $file),
                        'date' => date('Y-m-d H:i:s', filemtime($this->uploadDir . $file))
                    ];
                }
            }
        }
        return $files;
    }
}

$uploader = new FileUploader();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $result = $uploader->upload($_FILES["file"]);
    if ($result['success']) {
        $message = "File uploaded successfully: " . $result['originalName'];
        $messageType = "success";
    } else {
        $message = $result['message'];
        $messageType = "error";
    }
}

$files = $uploader->getUploadedFiles();
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload System</title>
    <style>
        .success { color: green; }
        .error { color: red; }
        .file-list { margin-top: 20px; }
        .file-item { padding: 10px; border: 1px solid #ccc; margin: 5px 0; }
    </style>
</head>
<body>
    <h1>File Upload System</h1>
    
    <?php if (isset($message)): ?>
        <p class="<?php echo $messageType; ?>"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Upload File</button>
    </form>
    
    <div class="file-list">
        <h2>Uploaded Files</h2>
        <?php foreach ($files as $file): ?>
        <div class="file-item">
            <strong><?php echo htmlspecialchars($file['name']); ?></strong><br>
            Size: <?php echo number_format($file['size'] / 1024, 2); ?> KB<br>
            Uploaded: <?php echo $file['date']; ?>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
?>
```

---

## 13. Hostinger-Specific Considerations

### File Permissions
```bash
# Set correct permissions for Hostinger
chmod 644 *.php
chmod 755 directories/
chmod 666 uploads/ (if writable by web server)
```

### .htaccess Configuration
```apache
# File: public_html/.htaccess
# Enable PHP
AddHandler application/x-httpd-php .php

# Security headers
Header always set X-Content-Type-Options nosniff
Header always set X-Frame-Options DENY
Header always set X-XSS-Protection "1; mode=block"

# Prevent access to sensitive files
<Files "*.log">
    Order allow,deny
    Deny from all
</Files>

<Files "config.php">
    Order allow,deny
    Deny from all
</Files>

# URL rewriting (if needed)
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
```

### Environment Configuration
```php
<?php
// File: public_html/config/environment.php
class Environment {
    public static function isProduction() {
        return $_SERVER['HTTP_HOST'] === 'yourdomain.com';
    }
    
    public static function isDevelopment() {
        return $_SERVER['HTTP_HOST'] === 'localhost' || 
               strpos($_SERVER['HTTP_HOST'], 'test') !== false;
    }
    
    public static function getConfig() {
        if (self::isProduction()) {
            return [
                'display_errors' => false,
                'log_errors' => true,
                'error_log' => '/path/to/error.log'
            ];
        } else {
            return [
                'display_errors' => true,
                'log_errors' => false
            ];
        }
    }
}

// Apply configuration
$config = Environment::getConfig();
foreach ($config as $key => $value) {
    ini_set($key, $value);
}
?>
```

---

## 14. Exercises and Challenges

### Beginner Exercises
1. Create a simple contact form that emails the message
2. Build a basic calculator with PHP
3. Create a file listing script that shows all files in a directory

### Intermediate Exercises
1. Build a user registration and login system
2. Create a simple blog with posts and comments
3. Build a file upload system with image thumbnails

### Advanced Exercises
1. Create a RESTful API for a todo application
2. Build a content management system (CMS)
3. Create a multi-user chat system using sessions

### Hostinger-Specific Challenges
1. Deploy a PHP application to Hostinger and configure the database
2. Set up automated backups for your MySQL database
3. Optimize your PHP application for shared hosting performance

---

## Related Tutorials & Next Steps

- [MySQL Database Design](05-mysql-database-design.md) - Database design and optimization
- [PHP Security Advanced](06-php-security-advanced.md) - Advanced security techniques
- [PHP Performance Optimization](07-php-performance-optimization.md) - Performance tuning
- [Hostinger Deployment Guide](../hostinger-php-mysql-tutorial.md) - Complete deployment guide
- [JavaScript Basics](03-javascript-basics.md) - Frontend integration
- [HTML Fundamentals](01-html-fundamentals.md) - HTML structure

---

**Next: [MySQL Database Design →](05-mysql-database-design.md)**

---

*Master PHP backend development and you'll be able to build powerful, secure web applications on Hostinger shared hosting!* 