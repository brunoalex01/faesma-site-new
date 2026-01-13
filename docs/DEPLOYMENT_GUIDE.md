# Deployment Guide - FAESMA Website

## 1. Prerequisites

Before deploying the FAESMA website, ensure the server meets the following requirements:
- **Web Server**: Apache 2.4+ (required for `.htaccess` support).
- **PHP**: Version 7.4 or higher.
- **MySQL**: Version 5.7 or higher (managed by UTF8MB4 for full character support).
- **RAM**: 512MB minimum (1GB recommended).
- **Storage**: 1GB minimum (SSD preferred).

## 2. Server Configuration

### Apache Configuration
Ensure `mod_rewrite` is enabled:
```bash
sudo a2enmod rewrite
sudo service apache2 restart
```

### PHP Settings
Configure `php.ini` for optimal file uploads:
```ini
upload_max_filesize = 10M
post_max_size = 12M
max_execution_time = 300
memory_limit = 256M
```

## 3. Deployment Steps

### Step 1: Upload Files
Upload all files from the project directory to your web root (typically `/var/www/html/` or `public_html/`).

### Step 2: Database Setup
1. Create a new database named `faesma_db`.
2. Import the schema:
   ```bash
   mysql -u [user] -p faesma_db < database/schema.sql
   ```
3. (Optional) Import seed data for testing:
   ```bash
   mysql -u [user] -p faesma_db < database/seed.sql
   ```

### Step 3: Configure PHP
Edit `config/config.php` and update the production credentials:
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'faesma_db');
define('DB_USER', 'production_user');
define('DB_PASS', 'secure_password');

// Set to false for production
define('DEVELOPMENT_MODE', false);
```

### Step 4: Folder Permissions
Set executable and write permissions for the uploads directory:
```bash
chmod -R 755 uploads/
chown -R www-data:www-data uploads/
```

## 4. Security Hardening

- **Force HTTPS**: Ensure an SSL certificate is installed (Let's Encrypt recommended).
- **Disable Directory Indexing**: Handled by the included `.htaccess`.
- **Restrict Config Access**: Ensure `config/config.php` is not accessible via web.

## 5. Verification Checklist

1. [ ] Accessible homepage at your domain.
2. [ ] Database connection functions (test News/Courses).
3. [ ] Contact form sends successfully (test submission).
4. [ ] Course filters and search work correctly.
5. [ ] SSL certificate is active and green.

---
**Author**: FAESMA IT Support (Bruno Alex) 
**Version**: 1.0
