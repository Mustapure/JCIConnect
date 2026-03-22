<?php
// Test 'jci_zone12' DB name (no space)
echo "Testing 'jci_zone12' database name...\n";

define('DB_HOST', 'localhost');
define('DB_NAME', 'jci_zone12');
define('DB_USER', 'root');
define('DB_PASS', '');

$conn = null;
try {
    echo "1. Connecting to MySQL...\n";
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS);
    if ($conn->connect_error) throw new Exception($conn->connect_error);
    echo "✅ Server OK\n";
    
    echo "2. CREATE DB if not exists...\n";
    $conn->query("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "`");
    if ($conn->error) throw new Exception("CREATE DB failed: " . $conn->error);
    echo "✅ DB created\n";
    
    echo "3. Select DB...\n";
    $conn->select_db(DB_NAME);
    if ($conn->error) throw new Exception("SELECT DB failed: " . $conn->error);
    echo "✅ DB selected\n";
    
    echo "4. Test query (SHOW TABLES)...\n";
    $result = $conn->query("SHOW TABLES");
    echo "✅ Tables found: " . $result->num_rows . "\n";
    
    $conn->close();
    echo "\n🎉 SUCCESS! Database 'jci_zone12' connection works perfectly.\n";
    echo "Now import schema: Open phpMyAdmin → Create/Select 'jci_zone12' → Import database.sql\n";
} catch (Exception $e) {
    echo "❌ FAILED: " . $e->getMessage() . "\n";
}
?>

