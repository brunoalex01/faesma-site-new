<?php
/**
 * FAESMA - Configuration File
 * 
 * Central configuration for database, paths, and site settings
 * 
 * @package FAESMA
 * @version 1.0
 */

// Prevent direct access
defined('FAESMA_ACCESS') or define('FAESMA_ACCESS', true);

// ============================================
// DATABASE CONFIGURATION
// ============================================
define('DB_HOST', 'localhost');
define('DB_NAME', 'faesma_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// ============================================
// PATH CONFIGURATION
// ============================================
define('BASE_PATH', dirname(__DIR__));
define('INCLUDES_PATH', BASE_PATH . '/includes');
define('ASSETS_PATH', BASE_PATH . '/assets');
define('UPLOADS_PATH', BASE_PATH . '/uploads');

// ============================================
// URL CONFIGURATION
// ============================================
// Automatically detect base URL
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
$baseDir = str_replace('\\', '/', dirname($scriptName));
$baseDir = $baseDir === '/' ? '' : $baseDir;

define('BASE_URL', $protocol . '://' . $host . $baseDir);
define('ASSETS_URL', BASE_URL . '/assets');
define('UPLOADS_URL', BASE_URL . '/uploads');

// ============================================
// SITE CONFIGURATION
// ============================================
define('SITE_NAME', 'FAESMA - Faculdade Alcance de Ensino Superior do Maranhão');
define('SITE_EMAIL', 'contato@faesma.com.br');
define('SITE_PHONE', '(98) 98848-7847');

// ============================================
// BRAND COLORS
// ============================================
define('COLOR_PRIMARY', '#0d0158');
define('COLOR_SECONDARY', '#008125');
define('COLOR_ACCENT', '#5ce1e6');
define('COLOR_WHITE', '#ffffff');
define('COLOR_BLACK', '#000000');

// ============================================
// SECURITY CONFIGURATION
// ============================================
define('SECURE_KEY', 'faesma_secure_key_2026'); // Change this in production
define('SESSION_LIFETIME', 7200); // 2 hours in seconds

// ============================================
// UPLOAD CONFIGURATION
// ============================================
define('MAX_FILE_SIZE', 5242880); // 5MB in bytes
define('ALLOWED_IMAGE_TYPES', ['image/jpeg', 'image/png', 'image/gif', 'image/webp']);

// ============================================
// PAGINATION CONFIGURATION
// ============================================
define('ITEMS_PER_PAGE', 12);
// define('NEWS_PER_PAGE', 9); -- caso for inserir página de notícias
// define('EVENTS_PER_PAGE', 6); -- caso for inserir página de eventos

// ============================================
// TIMEZONE CONFIGURATION
// ============================================
date_default_timezone_set('America/Sao_Paulo');

// ============================================
// ERROR REPORTING
// ============================================
// Development mode - set to FALSE in production
define('DEVELOPMENT_MODE', true);

if (DEVELOPMENT_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', BASE_PATH . '/logs/php-errors.log');
}

// ============================================
// SESSION CONFIGURATION
// ============================================
if (session_status() === PHP_SESSION_NONE) {
    session_start([
        'cookie_lifetime' => SESSION_LIFETIME,
        'cookie_httponly' => true,
        'cookie_secure' => $protocol === 'https',
        'use_strict_mode' => true
    ]);
}
