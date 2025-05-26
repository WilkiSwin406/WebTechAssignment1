
<?php
session_start(); // Start the session to handle login state and messages
require_once "../settings.php"; // Include database connection settings

// Initialize variables for error/success messages and display messages from redirects
$login_error = '';
$register_msg = '';
$message = '';

// Check if there's a message stored in session (from a refresh) and then clear it
if (!empty($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

// login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Retrieve submitted username and password (default empty string if not set)
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Connect to the database
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        // Connection failed, set login error message
        $login_error = "Database connection failed.";
    } else {
        // sql query
        $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        // Check if matching admin found
        if ($result && mysqli_num_rows($result) == 1) {
            // Valid login: set session flag and username
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['username'] = $username;
            $login_error = ''; // Clear error message

            // refresh the page
            header("Location: enhancements.php");
            exit();
        } else {
            // Invalid credentials - show error message
            $login_error = "Invalid username or password.";
        }
        // Close database connection
        mysqli_close($conn);
    }
}

// logout the user
if (isset($_GET['logout'])) {
    session_destroy(); // Destroy the session to log out
    header("Location: enhancements.php"); // Refresh page
    exit();
}

// Handle registration form submission (only if already logged in as admin)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register']) && !empty($_SESSION['admin_logged_in'])) {
    // Trim whitespace from new username and password
    $newuser = trim($_POST['username']);
    $newpass = trim($_POST['password']);

    // Validate inputs: username and password must not be empty
    if ($newuser === '' || $newpass === '') {
        $register_msg = "<p class='error-msg'>Username and password required.</p>";
    } else {
        // Connect to database
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if (!$conn) {
            $register_msg = "<p class='error-msg'>Database connection failed.</p>";
        } else {
            // Check if the username already exists
            $check_query = "SELECT id FROM admins WHERE username = '$newuser'";
            $check_result = mysqli_query($conn, $check_query);

            if ($check_result && mysqli_num_rows($check_result) > 0) {
                // Username already taken
                $register_msg = "<p class='error-msg'>Username already exists.</p>";
            } else {
                // Insert new admin user into the database (direct SQL)
                $insert_query = "INSERT INTO admins (username, password) VALUES ('$newuser', '$newpass')";
                if (mysqli_query($conn, $insert_query)) {
                    // Registration success message
                    $register_msg = "<p class='success-msg'>Admin account created successfully.</p>";
                } else {
                    // Database insertion error message
                    $register_msg = "<p class='error-msg'>Error: " . mysqli_error($conn) . "</p>";
                }
            }
            mysqli_close($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Administrator Login & Registration</title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body class="admin-page">
    <header class="site-header">
        <div class="logo-title">
            <img src="../../images/logo.png" alt="CyberBytes Logo" class="logo-image">
            <h1>CyberBytes</h1>
        </div>
        <nav class="nav-links">
            <a href="../index.php">Index</a>
            <a href="../jobs.php">Jobs</a>
            <a href="../apply.php">Apply</a>
            <a href="../about.php">About</a>
            <a href="mailto:webtechprojectteam@gmail.com">Contact us</a>
            
        </nav>
    </header>

    <div class="container">
        <!-- Show message from redirects -->
        <?php if ($message): ?>
            <p class="error-msg"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <!-- Login Box -->
        <section class="box">
            <h2>Admin Login</h2>
            <?php if ($login_error): ?>
                <p class="error-msg"><?= htmlspecialchars($login_error) ?></p>
            <?php endif; ?>
            <form method="post" action="enhancements.php">
                <label for="login_username">Username:</label>
                <input type="text" name="username" id="login_username" required>

                <label for="login_password">Password:</label>
                <input type="password" name="password" id="login_password" required>

                <input type="submit" name="login" value="Login">
            </form>
        </section>

        <!-- Registration Box -->
        <section class="box">
            <h2>Register New Admin</h2>
            <?php if (!empty($_SESSION['admin_logged_in'])): ?>
                <?= $register_msg ?>
                <form method="post" action="enhancements.php">
                    <label for="reg_username">Username:</label>
                    <input type="text" name="username" id="reg_username" required>

                    <label for="reg_password">Password:</label>
                    <input type="text" name="password" id="reg_password" required>

                    <input type="submit" name="register" value="Register">
                </form>
            <?php else: ?>
                <p class="error-msg">Please log in to register new admins.</p>
            <?php endif; ?>
        </section>
    </div>

    <footer class="site-footer">
        <p>&copy; 2025, The Swinburne Sigmas. All rights reserved.</p>
        <a href="https://webtechprojectteam.atlassian.net/jira/software/projects/SCRUM/boards/1">The Swinburne Sigmas Jira Project</a>
        <p></p>
        <a href="mailto:webtechprojectteam@gmail.com">Contact us</a>
        <p></p>
        <a href="../index.php">Index</a>
        <a href="../jobs.php">Jobs</a>
        <a href="../apply.php">Apply</a>
        <a href="../about.php">About</a>
        <a href="enhancements.php">Admin</a>
        <a href="../manage.php">Manage</a>
        <?php if (!empty($_SESSION['admin_logged_in'])): ?>
                <a href="enhancements.php?logout=1">Logout</a>
            <?php endif; ?>
    </footer>
</body>
</html>