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
                        <small>Hostinger PHP/MySQL Tutorial</small>
                    </div>
                    <div class="card-body">
                        <?php
                        // Display success/error messages
                        if (isset($_GET['status'])) {
                            if ($_GET['status'] == 'success') {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> Your message has been sent successfully.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                      </div>';
                            } elseif ($_GET['status'] == 'error') {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> There was a problem sending your message. Please try again.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                      </div>';
                            }
                        }
                        ?>
                        
                        <form action="process-form.php" method="POST" id="contactForm">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="name" name="name" required 
                                       placeholder="Enter your full name">
                                <div class="invalid-feedback">
                                    Please provide your name.
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required 
                                       placeholder="Enter your email address">
                                <div class="invalid-feedback">
                                    Please provide a valid email address.
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required 
                                          placeholder="Enter your message here..."></textarea>
                                <div class="invalid-feedback">
                                    Please provide your message.
                                </div>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Additional Info Card -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">About This Application</h5>
                        <p class="card-text">
                            This is a complete PHP/MySQL contact form built for Hostinger hosting. 
                            It demonstrates secure form processing, database connectivity, and modern web design.
                        </p>
                        <ul class="list-unstyled">
                            <li><strong>Features:</strong></li>
                            <li>✓ Secure form validation</li>
                            <li>✓ SQL injection protection</li>
                            <li>✓ Responsive Bootstrap design</li>
                            <li>✓ Error handling</li>
                            <li>✓ Database storage</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <script>
        // Form validation
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            if (!this.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            this.classList.add('was-validated');
        });
    </script>
</body>
</html> 