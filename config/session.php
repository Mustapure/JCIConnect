<?php
/**
 * JCIConnect Session Configuration
 * Secure session handling
 */

if (session_status() == PHP_SESSION_NONE) {
    // Secure session settings
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_secure', isset($_SERVER['HTTPS'])); // HTTPS only in prod
    
    // Regenerate on privilege changes (login/logout)
    if (!isset($_SESSION['created'])) {
        $_SESSION['created'] = time();
    } elseif (time() - $_SESSION['created'] > 1800) { // 30 min
        session_regenerate_id(true);
        $_SESSION['created'] = time();
    }
    
    session_start();
}

// Auto-logout inactive users (2 hours)
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 7200)) {
    session_unset();
    session_destroy();
    redirect('login.php', 'Session expired. Please login again.', 'warning');
}

if (!isset($_SESSION['last_activity'])) {
    $_SESSION['last_activity'] = time();
}

// Block suspicious activity
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
    $_SESSION['lockout_time'] = 0;
}
?>

