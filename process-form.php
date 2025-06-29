<?php
// Include database configuration
require_once 'config.php';

// Check if form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Initialize variables
    $name = '';
    $email = '';
    $message = '';
    $errors = array();
    
    // Sanitize and validate name
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
        if (strlen($name) < 2 || strlen($name) > 100) {
            $errors[] = "Name must be between 2 and 100 characters.";
        }
    } else {
        $errors[] = "Name is required.";
    }
    
    // Sanitize and validate email
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please provide a valid email address.";
        }
    } else {
        $errors[] = "Email is required.";
    }
    
    // Sanitize and validate message
    if (isset($_POST['message']) && !empty($_POST['message'])) {
        $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);
        if (strlen($message) < 10 || strlen($message) > 1000) {
            $errors[] = "Message must be between 10 and 1000 characters.";
        }
    } else {
        $errors[] = "Message is required.";
    }
    
    // If no validation errors, proceed with database insertion
    if (empty($errors)) {
        
        // Prepare SQL statement to prevent SQL injection
        $sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        
        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);
            
            // Execute statement
            if (mysqli_stmt_execute($stmt)) {
                // Success - redirect with success message
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                header("Location: index.php?status=success");
                exit();
            } else {
                // Database error
                $errors[] = "Database error: " . mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
            }
        } else {
            // Prepare statement error
            $errors[] = "Database preparation error: " . mysqli_error($conn);
        }
    }
    
    // If there are errors, redirect with error message
    if (!empty($errors)) {
        mysqli_close($conn);
        header("Location: index.php?status=error");
        exit();
    }
    
} else {
    // If accessed directly without POST, redirect to form
    header("Location: index.php");
    exit();
}

// Close database connection
mysqli_close($conn);
?> 