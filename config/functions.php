<?php
/**
 * JCIConnect Common Functions
 * Utilities for auth, validation, redirects, etc.
 */

require_once __DIR__ . '/database.php'; // Ensure $conn available

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Get current user data
function getCurrentUser($user_id = null) {
    if (!$user_id) $user_id = $_SESSION['user_id'] ?? null;
    if (!$user_id) return null;
    
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? AND status = 'active'");
    $stmt->execute([$user_id]);
    return $stmt->fetch();
}

// Redirect helper
function redirect($url, $message = '', $type = 'info') {
    $_SESSION['message'] = ['text' => $message, 'type' => $type];
    header("Location: $url");
    exit;
}

// Display message and clear
function displayMessage() {
    if (isset($_SESSION['message'])) {
        $msg = $_SESSION['message'];
        $alertClass = match($msg['type']) {
            'success' => 'success',
            'error' => 'danger',
            'warning' => 'warning',
            default => 'info'
        };
        echo "<div class='alert alert-{$alertClass} alert-dismissible fade show' role='alert'>";
        echo "<strong>" . ucfirst($alertClass) . "!</strong> " . htmlspecialchars($msg['text']);
        echo "<button type='button' class='btn-close' data-bs-dismiss='alert'></button>";
        echo "</div>";
        unset($_SESSION['message']);
    }
}

// Sanitize input
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Validate email
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Password hash
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Verify password
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

// CSRF token
function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Verify CSRF
function verifyCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Format phone
function formatPhone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    if (preg_match('/^(\d{3})(\d{3})(\d{4})$/', $phone, $matches)) {
        return '(' . $matches[1] . ') ' . $matches[2] . '-' . $matches[3];
    }
    return $phone;
}

// Pagination helper
function getPagination($current, $total, $perPage = 10, $baseUrl = '?') {
    $totalPages = ceil($total / $perPage);
    $html = '<nav aria-label="Pagination"><ul class="pagination">';
    
    for ($i = 1; $i <= $totalPages; $i++) {
        $active = $i == $current ? 'active' : '';
        $html .= "<li class='page-item $active'><a class='page-link' href='$baseUrl&page=$i'>$i</a></li>";
    }
    
    $html .= '</ul></nav>';
    return $html;
}
?>

