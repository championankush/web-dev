# Hostinger Coding & Deployment Workflow

**Navigation:** [← Previous: MySQL Database Design](05-mysql-database-design.md)

---

## 📚 Table of Contents

1. [Overview: Coding on Shared Hosting](#overview-coding-on-shared-hosting)
2. [Using Hostinger File Manager](#using-hostinger-file-manager)
3. [FTP/SFTP Access](#ftpsftp-access)
4. [Recommended Project Structure](#recommended-project-structure)
5. [Editing Code Directly on Hostinger](#editing-code-directly-on-hostinger)
6. [Local Development & Deployment](#local-development--deployment)
7. [Deployment Workflow (Step-by-Step)](#deployment-workflow-step-by-step)
8. [Automating Deployments (Advanced)](#automating-deployments-advanced)
9. [Troubleshooting Common Issues](#troubleshooting-common-issues)
10. [Best Practices for Shared Hosting](#best-practices-for-shared-hosting)

---

## 1. Overview: Coding on Shared Hosting

Hostinger shared/business hosting is designed for easy web development. You can:
- Edit files directly in the browser (File Manager)
- Upload/download via FTP/SFTP
- Deploy from your local machine
- Use version control (Git) for advanced workflows

---

## 2. Using Hostinger File Manager

1. **Login to hPanel:** [hpanel.hostinger.com](https://hpanel.hostinger.com)
2. Go to **Files > File Manager**
3. Navigate to `public_html/` (your website root)
4. Use the interface to:
   - Create, edit, rename, or delete files/folders
   - Upload/download files (drag & drop supported)
   - Extract/upload ZIP archives for bulk uploads
5. Use the built-in code editor for quick changes

**Tip:** Always back up files before making major changes.

---

## 3. FTP/SFTP Access

1. In hPanel, go to **Files > FTP Accounts**
2. Note your FTP hostname, username, and create a password
3. Use an FTP client (e.g., FileZilla, WinSCP):
   - Host: your domain or server IP
   - Username: as shown in hPanel
   - Password: as set above
   - Port: 21 (FTP) or 22 (SFTP, if supported)
4. Connect and transfer files between your computer and `public_html/`

**Security:** Use SFTP if available for encrypted transfers.

---

## 4. Recommended Project Structure

```
public_html/
├── index.php
├── config.php
├── includes/
│   ├── functions.php
│   └── database.php
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── uploads/
└── .htaccess
```

---

## 5. Editing Code Directly on Hostinger

- Use File Manager's code editor for small changes
- For larger edits, download files, edit locally, and re-upload
- Always test changes in a browser after saving
- Use versioning (e.g., `index_v2.php`) for backup before major edits

---

## 6. Local Development & Deployment

1. Set up a local server (XAMPP, MAMP, Laragon, etc.)
2. Develop and test your site locally
3. When ready, upload files to `public_html/` via File Manager or FTP
4. Update `config.php` with your Hostinger database credentials
5. Test your site live

---

## 7. Deployment Workflow (Step-by-Step)

1. **Develop Locally:**
   - Use Git for version control (optional but recommended)
   - Test all features
2. **Prepare for Deployment:**
   - Remove debug code and sensitive info
   - Set correct file permissions (644 for files, 755 for folders)
3. **Upload Files:**
   - Use File Manager or FTP/SFTP
   - Overwrite old files or upload new ones
4. **Update Database:**
   - Use phpMyAdmin to import/export SQL if needed
5. **Test Live Site:**
   - Check all pages and features
   - Fix any issues
6. **Backup:**
   - Download a backup of files and database after deployment

---

## 8. Automating Deployments (Advanced)

- Use Git integration (if available in hPanel)
- Set up a deployment script to pull from GitHub
- Use CI/CD tools (e.g., GitHub Actions) to deploy via FTP
- For business hosting, consider SSH for advanced automation

---

## 9. Troubleshooting Common Issues

- **White screen / 500 error:** Check for PHP errors, missing files, or incorrect permissions
- **File not updating:** Clear browser and server cache, ensure upload succeeded
- **Database connection errors:** Double-check credentials in `config.php`
- **Permission denied:** Set correct permissions in File Manager or via FTP
- **Uploads not working:** Ensure `uploads/` is writable (chmod 755 or 775)
- **Site not loading:** Check DNS, domain settings, and that files are in `public_html/`

---

## 10. Best Practices for Shared Hosting

- Keep your code and dependencies up to date
- Use `.htaccess` for security (block access to sensitive files)
- Regularly back up your site and database
- Limit file and folder permissions
- Avoid storing sensitive data in public files
- Monitor your site for unusual activity

---

**You are now ready to develop, deploy, and manage PHP/MySQL web applications on Hostinger shared or business hosting!** 