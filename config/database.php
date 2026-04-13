<?php
/**
 * JCIConnect Database Configuration
 * PDO Connection for XAMPP/MySQL
 */

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'jci_zone12');
define('DB_USER', 'root');
define('DB_PASS', '');

// Create connection
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    $conn = new PDO($dsn, DB_USER, DB_PASS, $options);
    
    // Test connection
    $conn->query("SELECT 1");
    
} catch (PDOException $e) {
    // Development: show error
    die("Database connection failed: " . $e->getMessage() . 
        "<br>Check: DB '" . DB_NAME . "' exists? Import database.sql via phpMyAdmin");
}

// Make global for legacy includes
$GLOBALS['conn'] = $conn;
$conn = $GLOBALS['conn'];

// Connection success indicator (disabled per request)\n// if (!isset($_GET['hide_db_test'])) {\n//     echo '<div style="background: #d4edda; color: #155724; padding: 10px; text-align: center; margin: 10px 0; border-radius: 5px;"><strong>✅ Database Connected Successfully!</strong> (PDO Ready)</div>';\n// }
?>

