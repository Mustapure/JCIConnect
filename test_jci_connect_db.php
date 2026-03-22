<?php
// Test 'jci connect' DB name
echo "Testing 'jci connect' database name...\n";

define('DB_HOST', 'localhost');
define('DB_NAME', 'jci connect');
define('DB_USER', 'root');
define('DB_PASS', '');

$conn = null;
try {
    echo "1. Connecting...\n";
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS);
    if ($conn->connect_error) throw new Exception($conn->connect_error);
    echo "✅ Server OK\n";
    
    echo "2. CREATE 'jci connect'...\n";
    $conn->query("CREATE DATABASE IF NOT EXISTS `jci connect`");
    $conn->select_db('`jci connect`');
    echo "✅ DB created/selected\n";
    
    echo "3. Test query...\n";
    $result = $conn->query("SHOW TABLES");
    echo "✅ Tables: " . $result->num_rows . "\n";
    
    $conn->close();
    echo "\n✅ 'jci connect' WORKS! (backticks needed in queries)\n";
    echo "Update config/database.php: define('DB_NAME', '`jci connect`');\n";
} catch (Exception $e) {
    echo "❌ FAILED: " . $e->getMessage() . "\n";
}
?>

