# Hostinger PHP/MySQL Contact Form Tutorial

A complete, production-ready contact form built with PHP and MySQL, specifically designed for Hostinger hosting. This project demonstrates secure form processing, database connectivity, and modern web design.

## 🚀 Quick Start

### Prerequisites
- Hostinger hosting account
- Domain or subdomain
- Basic knowledge of hPanel

### Installation Steps

1. **Create Database in hPanel**
   - Go to hPanel → Hosting → Databases → MySQL Databases
   - Create database: `yourusername_contact_form_db`
   - Create user: `yourusername_contact_user`
   - Assign user to database with ALL PRIVILEGES

2. **Upload Files**
   - In hPanel → Files → File Manager
   - Navigate to `public_html/`
   - Create folder: `contact-form`
   - Upload all project files

3. **Configure Database**
   - Edit `config.php`
   - Replace placeholder values with your actual database credentials
   - Save file

4. **Create Database Table**
   - Go to hPanel → Hosting → Databases → phpMyAdmin
   - Select your database
   - Click SQL tab
   - Copy and paste contents of `database.sql`
   - Execute

5. **Test Your Application**
   - Visit: `https://yourdomain.com/contact-form/`
   - Fill out and submit the form
   - Check for success message

## 📁 Project Structure

```
contact-form/
├── index.php          # Main contact form page
├── process-form.php   # Form processing logic
├── config.php         # Database configuration
├── style.css          # Modern styling
├── database.sql       # Database schema
└── README.md          # This file
```

## 🔧 Configuration

### Database Settings (`config.php`)
```php
$host = 'localhost';
$dbname = 'yourusername_contact_form_db';  // Your database name
$username = 'yourusername_contact_user';   // Your database username
$password = 'your_strong_password';        // Your database password
```

### PHP Version
- Recommended: PHP 8.1 or 8.2
- Set in hPanel → Hosting → PHP Config

## 🛡️ Security Features

- ✅ SQL injection protection (prepared statements)
- ✅ Input sanitization and validation
- ✅ XSS protection
- ✅ CSRF protection (form tokens)
- ✅ Secure database connections
- ✅ Error handling without information disclosure

## 🎨 Features

- **Responsive Design**: Works on all devices
- **Modern UI**: Bootstrap 5 with custom styling
- **Form Validation**: Client-side and server-side
- **Success/Error Messages**: User-friendly feedback
- **Database Storage**: All messages saved to MySQL
- **Security**: Production-ready security measures

## 🐛 Troubleshooting

### Common Issues

**"Access Denied" Error**
- Verify database credentials in `config.php`
- Check user privileges in hPanel
- Ensure database name includes username prefix

**PHP Version Issues**
- Set PHP version in hPanel → Hosting → PHP Config
- Choose PHP 8.1 or 8.2

**File Upload Problems**
- Check file permissions (644 for files, 755 for directories)
- Use FTP if File Manager fails

### Error Logs
- Check hPanel → Files → Error Logs
- Look for PHP errors or warnings

## 🚀 AI-Powered Development with Cursor

This project is designed to work seamlessly with Cursor's AI features:

### Code Generation
```
[Ctrl+K] "Create a responsive contact form using Bootstrap 5"
[Ctrl+K] "Write secure PHP database connection for Hostinger"
[Ctrl+K] "Generate form processing with validation"
```

### Debugging
```
[Ctrl+K] "Fix MySQL connection timeout on Hostinger"
[Ctrl+K] "Resolve PHP version compatibility issues"
[Ctrl+K] "Debug form submission errors"
```

### Optimization
```
[Ctrl+K] "Optimize PHP MySQL queries for performance"
[Ctrl+K] "Add security enhancements to contact form"
[Ctrl+K] "Implement AJAX form submission"
```

## 📈 Next Steps

### Enhancements
- [ ] Add CAPTCHA protection
- [ ] Email notifications
- [ ] Admin panel for message management
- [ ] File upload functionality
- [ ] AJAX form submission

### Advanced Features
- [ ] User authentication system
- [ ] Blog/CMS functionality
- [ ] E-commerce integration
- [ ] API development
- [ ] Mobile app backend

## 📚 Resources

- [Hostinger Knowledge Base](https://www.hostinger.com/help)
- [PHP Documentation](https://www.php.net/docs.php)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [Bootstrap Documentation](https://getbootstrap.com/docs/)

## 🤝 Contributing

Feel free to submit issues, feature requests, or pull requests to improve this tutorial.

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

---

**Built with ❤️ for the Hostinger community**

*Perfect for beginners learning PHP/MySQL web development on Hostinger hosting.* 