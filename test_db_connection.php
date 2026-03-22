<?php
/**
 * PDO Database Connection Test + Examples
 * As per task guide #5-7
 */

require_once __DIR__ . '/config/database.php';

echo "<h1>✅ PDO Database Connection Test</h1>";

// Test 1: Connection status
echo "<p><strong>Connection:</strong> " . ($conn ? 'SUCCESS' : 'FAILED') . "</p>";

// Task #7 Example: Fetch data
try {
    $sql = "SELECT * FROM users LIMIT 5";
    $stmt = $conn->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h2>Users (Fetch Example):</h2>";
    if (empty($users)) {
        echo "<p>No users yet. Schema imported?</p>";
    } else {
        echo "<ul>";
        foreach ($users as $user) {
            echo "<li>{$user['first_name']} {$user['last_name']} - {$user['email']}</li>";
        }
        echo "</ul>";
    }
} catch (PDOException $e) {
    echo "<p>Query error: " . $e->getMessage() . "</p>";
}

// Task #6 Example: Insert data (demo - change values)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['demo_insert'])) {
    try {
        $sql = "INSERT INTO users (first_name, last_name, email, password, user_type) VALUES (:name, :last, :email, :pass, :type)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':name' => 'Demo',
            ':last' => 'User',
            ':email' => 'demo' . time() . '@jci.local',
            ':pass' => password_hash('demo123', PASSWORD_DEFAULT),
            ':type' => 'individual'
        ]);
        echo "<p style='color: green;'>✅ Demo insert success! ID: " . $conn->lastInsertId() . "</p>";
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Insert error: " . $e->getMessage() . "</p>";
    }
}

echo "<form method='POST'><button type='submit' name='demo_insert'>Run Demo Insert</button></form>";
echo "<p><a href='index.php'>← Back to Home</a></p>";
?>

