<?php
session_start();
require_once "../settings.php"; // Contains DB credentials: $host, $user, $pwd, $sql_db

// Create or resume login attempt session
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}
if (!isset($_SESSION['lockout_time'])) {
    $_SESSION['lockout_time'] = 0;
}

$now = time();

// Check if currently locked out
if ($now < $_SESSION['lockout_time']) {
    $_SESSION['login_error'] = "Too many failed attempts. Please try again after 2 minutes.";
    header("Location: admin.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Connect to the database
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        $_SESSION['login_error'] = "Database connection failed.";
        header("Location: admin.php");
        exit();
    }

    // Sanitize inputs
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Successful login
        $_SESSION['login_attempts'] = 0;
        $_SESSION['lockout_time'] = 0;
        $_SESSION['login_success'] = "Welcome, $username!";
        header("Location: adminrg.php"); // Change to your admin landing page
    } else {
        // Failed login
        $_SESSION['login_attempts']++;

        if ($_SESSION['login_attempts'] >= 3) {
            $_SESSION['lockout_time'] = $now + 120; // 2-minute lockout
            $_SESSION['login_error'] = "Too many failed attempts. Please try again after 2 minutes.";
        } else {
            $remaining = 3 - $_SESSION['login_attempts'];
            $_SESSION['login_error'] = "Invalid login. $remaining attempt(s) remaining.";
        }

        header("Location: admin.php");
    }

    mysqli_close($conn);
}
?>
