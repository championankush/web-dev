# MySQL Database Design & Usage on Hostinger

**Navigation:** [← Previous: PHP Backend Development](04-php-backend-development.md) | [Next: Hostinger Coding Workflow →](06-hostinger-coding-workflow.md)

---

## 📚 Table of Contents

1. [Introduction to MySQL on Hostinger](#introduction-to-mysql-on-hostinger)
2. [Creating a Database in hPanel](#creating-a-database-in-hpanel)
3. [Managing Users & Privileges](#managing-users--privileges)
4. [Accessing phpMyAdmin](#accessing-phpmyadmin)
5. [Remote MySQL Access](#remote-mysql-access)
6. [Database Design Best Practices](#database-design-best-practices)
7. [Connecting PHP to MySQL](#connecting-php-to-mysql)
8. [Common Operations & Queries](#common-operations--queries)
9. [Security & Performance Tips](#security--performance-tips)
10. [Backup & Restore](#backup--restore)
11. [Troubleshooting](#troubleshooting)
12. [Exercises & Challenges](#exercises--challenges)

---

## 1. Introduction to MySQL on Hostinger

MySQL is the default database system on Hostinger shared and business hosting. You can manage databases via hPanel and phpMyAdmin, and connect from your PHP code securely.

---

## 2. Creating a Database in hPanel

1. **Login to hPanel:** [hpanel.hostinger.com](https://hpanel.hostinger.com)
2. Go to **Databases > MySQL Databases**
3. Under **Create a New MySQL Database**:
   - Enter a database name (e.g., `myapp_db`)
   - Enter a username (e.g., `myapp_user`)
   - Enter a strong password
   - Click **Create**
4. Note the database name, username, and password for your PHP config.

---

## 3. Managing Users & Privileges

- Each database can have multiple users.
- Assign only necessary privileges (e.g., SELECT, INSERT, UPDATE, DELETE).
- In hPanel, you can add/remove users and set privileges for each database.

---

## 4. Accessing phpMyAdmin

1. In hPanel, go to **Databases > phpMyAdmin**
2. Click **Enter phpMyAdmin** next to your database
3. Use the interface to:
   - Create tables
   - Run SQL queries
   - Import/export data
   - Manage indexes and relationships

---

## 5. Remote MySQL Access

- By default, remote access is disabled for security.
- To enable:
  1. In hPanel, go to **Databases > Remote MySQL**
  2. Add your IP address or `%` (all IPs, not recommended)
  3. Use the provided hostname, username, and password in your remote tool (e.g., MySQL Workbench)
- Always disable remote access when not needed.

---

## 6. Database Design Best Practices

- Use clear, consistent table and column names (e.g., `users`, `created_at`)
- Always set a primary key (usually `id` INT AUTO_INCREMENT)
- Use appropriate data types (e.g., VARCHAR for text, INT for numbers, DATETIME for timestamps)
- Normalize your tables to avoid data duplication
- Add indexes to columns used in WHERE, JOIN, or ORDER BY
- Use foreign keys for relationships

**Example Table:**
```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

---

## 7. Connecting PHP to MySQL

**config.php**
```php
<?php
$host = 'localhost';
$db   = 'your_db_name';
$user = 'your_db_user';
$pass = 'your_db_password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
     throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>
```

---

## 8. Common Operations & Queries

**Insert:**
```php
$stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
$stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
```

**Select:**
```php
$stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch();
```

**Update:**
```php
$stmt = $pdo->prepare('UPDATE users SET name = ? WHERE id = ?');
$stmt->execute([$newName, $userId]);
```

**Delete:**
```php
$stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
$stmt->execute([$userId]);
```

---

## 9. Security & Performance Tips

- Always use prepared statements to prevent SQL injection
- Never store plain-text passwords (use `password_hash` and `password_verify`)
- Limit user privileges
- Regularly update your database password
- Use indexes for faster queries
- Clean up unused data and tables

---

## 10. Backup & Restore

**Backup:**
- In hPanel, go to **Files > Backups** or **phpMyAdmin > Export**
- Download a full SQL dump regularly

**Restore:**
- In hPanel, use **Files > Backups** or **phpMyAdmin > Import**
- Upload your SQL file and run the import

---

## 11. Troubleshooting

- **Cannot connect:** Check credentials, database name, and user privileges
- **Access denied:** Make sure the user has privileges for the database
- **Timeouts:** Optimize queries, add indexes, and avoid large unindexed tables
- **Remote access fails:** Ensure your IP is whitelisted in hPanel

---

## 12. Exercises & Challenges

1. Create a new database and user in hPanel
2. Design a `posts` table with fields: id, title, content, author_id, created_at
3. Write PHP code to insert and fetch posts
4. Export your database and restore it on another Hostinger account
5. Set up remote access and connect with MySQL Workbench

---

**Next: [Hostinger Coding Workflow →](06-hostinger-coding-workflow.md)** 