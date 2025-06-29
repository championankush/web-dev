# Hostinger Deployment Checklist

## ✅ Pre-Deployment Checklist

### 1. Hostinger Account Setup
- [ ] Hostinger hosting account active
- [ ] Domain or subdomain configured
- [ ] hPanel access credentials ready

### 2. Database Preparation
- [ ] MySQL database created in hPanel
- [ ] Database user created with strong password
- [ ] User assigned to database with ALL PRIVILEGES
- [ ] Database credentials noted down securely

### 3. PHP Configuration
- [ ] PHP version set to 8.1 or 8.2 in hPanel
- [ ] mysqli extension enabled
- [ ] Error reporting enabled for development

## 🚀 Deployment Steps

### Step 1: File Upload
- [ ] Access hPanel → Files → File Manager
- [ ] Navigate to `public_html/` directory
- [ ] Create new folder: `contact-form`
- [ ] Upload all project files:
  - [ ] `index.php`
  - [ ] `process-form.php`
  - [ ] `config.php`
  - [ ] `style.css`
  - [ ] `database.sql`
  - [ ] `README.md`

### Step 2: File Permissions
- [ ] Set file permissions to 644 for all `.php` files
- [ ] Set file permissions to 644 for `.css` file
- [ ] Set directory permissions to 755

### Step 3: Database Configuration
- [ ] Edit `config.php` file in File Manager
- [ ] Replace placeholder values with actual credentials:
  - [ ] Database name: `yourusername_contact_form_db`
  - [ ] Username: `yourusername_contact_user`
  - [ ] Password: `your_actual_password`
- [ ] Save the file

### Step 4: Database Table Creation
- [ ] Access hPanel → Hosting → Databases → phpMyAdmin
- [ ] Select your database from dropdown
- [ ] Click "SQL" tab
- [ ] Copy entire contents of `database.sql`
- [ ] Paste into SQL query box
- [ ] Click "Go" to execute
- [ ] Verify table `contact_messages` was created

## 🧪 Testing Checklist

### Step 5: Application Testing
- [ ] Visit your application URL:
  - [ ] `https://yourdomain.com/contact-form/` (main domain)
  - [ ] OR `https://contact.yourdomain.com/` (subdomain)
- [ ] Verify page loads without errors
- [ ] Test form validation:
  - [ ] Try submitting empty form (should show validation errors)
  - [ ] Enter invalid email (should show error)
  - [ ] Enter short message (should show error)
- [ ] Test successful submission:
  - [ ] Fill all fields correctly
  - [ ] Submit form
  - [ ] Verify success message appears
  - [ ] Check database for new record

### Step 6: Database Verification
- [ ] Go to phpMyAdmin
- [ ] Select your database
- [ ] Click on `contact_messages` table
- [ ] Verify test submission appears in table
- [ ] Check that all fields are populated correctly

## 🔧 Troubleshooting

### Common Issues & Solutions

#### "Connection Failed" Error
- [ ] Verify database credentials in `config.php`
- [ ] Check database is active in hPanel
- [ ] Ensure mysqli extension is enabled

#### "Access Denied" Error
- [ ] Verify database name includes username prefix
- [ ] Check user privileges in hPanel
- [ ] Confirm user is assigned to database

#### Page Not Loading
- [ ] Check file permissions (644 for files, 755 for directories)
- [ ] Verify PHP version is 8.1 or 8.2
- [ ] Check error logs in hPanel → Files → Error Logs

#### Form Not Submitting
- [ ] Verify `process-form.php` file exists
- [ ] Check form action path is correct
- [ ] Ensure database table exists

## 🛡️ Security Checklist

### Production Security
- [ ] Disable error reporting in `config.php` (comment out lines)
- [ ] Use HTTPS for production site
- [ ] Regularly backup database via phpMyAdmin
- [ ] Monitor error logs for suspicious activity
- [ ] Keep PHP version updated

### Database Security
- [ ] Use strong database passwords
- [ ] Limit database user privileges if possible
- [ ] Regularly backup database
- [ ] Monitor database access logs

## 📱 Mobile Testing

### Responsive Design Check
- [ ] Test on mobile device or browser dev tools
- [ ] Verify form is usable on small screens
- [ ] Check that buttons are touch-friendly
- [ ] Ensure text is readable on mobile

## 🎯 Final Verification

### Complete Application Test
- [ ] Form displays correctly on all devices
- [ ] All validation works properly
- [ ] Success/error messages display correctly
- [ ] Data is saved to database
- [ ] No PHP errors in logs
- [ ] Application loads quickly

## 📞 Support Resources

### If You Need Help
- [ ] Check Hostinger Knowledge Base
- [ ] Review error logs in hPanel
- [ ] Verify all checklist items are completed
- [ ] Test with sample data first

---

**🎉 Congratulations!** Your PHP/MySQL contact form is now live on Hostinger!

**Next Steps:**
- Consider adding CAPTCHA protection
- Implement email notifications
- Create an admin panel
- Add more form fields as needed
- Optimize for performance

**Remember:** Keep your database credentials secure and regularly backup your data! 