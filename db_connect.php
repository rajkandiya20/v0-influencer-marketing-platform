<?php
/**
 * Rexo Agency - Database Connection
 * Secure PDO connection with error handling
 */

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'rexo_agency');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Site Configuration
define('SITE_NAME', 'Rexo Agency');
define('SITE_URL', 'http://localhost/rexo-agency');
define('SITE_EMAIL', 'hello@rexoagency.com');

// Session Configuration
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Get Database Connection
 */
function getDBConnection() {
    static $pdo = null;
    
    if ($pdo === null) {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        
        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            error_log("Database Connection Error: " . $e->getMessage());
            die("Database connection failed. Please try again later.");
        }
    }
    
    return $pdo;
}

/**
 * Check if user is logged in
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Get current user data
 */
function getCurrentUser() {
    if (!isLoggedIn()) {
        return null;
    }
    
    $pdo = getDBConnection();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch();
}

/**
 * Redirect with message
 */
function redirect($url, $message = '', $type = 'success') {
    if (!empty($message)) {
        $_SESSION['flash_message'] = $message;
        $_SESSION['flash_type'] = $type;
    }
    header("Location: $url");
    exit;
}

/**
 * Display flash message
 */
function displayFlashMessage() {
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        $type = $_SESSION['flash_type'] ?? 'success';
        unset($_SESSION['flash_message'], $_SESSION['flash_type']);
        
        $alertClass = $type === 'error' ? 'alert-danger' : 'alert-success';
        return "<div class='alert $alertClass alert-dismissible fade show' role='alert'>
                    $message
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                </div>";
    }
    return '';
}

/**
 * Sanitize input
 */
function sanitize($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * Format currency (Indian Rupees)
 */
function formatCurrency($amount) {
    if ($amount >= 10000000) {
        return '₹' . round($amount / 10000000, 2) . ' Cr';
    } elseif ($amount >= 100000) {
        return '₹' . round($amount / 100000, 2) . ' L';
    } elseif ($amount >= 1000) {
        return '₹' . round($amount / 1000, 2) . 'K';
    }
    return '₹' . number_format($amount, 0);
}

/**
 * Format large numbers
 */
function formatNumber($num) {
    if ($num >= 1000000000) {
        return round($num / 1000000000, 1) . 'B';
    } elseif ($num >= 1000000) {
        return round($num / 1000000, 1) . 'M';
    } elseif ($num >= 1000) {
        return round($num / 1000, 1) . 'K';
    }
    return number_format($num);
}

/**
 * Get active campaigns count
 */
function getActiveCampaignsCount() {
    $pdo = getDBConnection();
    $stmt = $pdo->query("SELECT COUNT(*) FROM campaigns WHERE status = 'active'");
    return $stmt->fetchColumn();
}

/**
 * Get total users count by type
 */
function getUsersCount($type = null) {
    $pdo = getDBConnection();
    if ($type) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE user_type = ?");
        $stmt->execute([$type]);
    } else {
        $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    }
    return $stmt->fetchColumn();
}
?>
