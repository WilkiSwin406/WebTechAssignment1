<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Connor Wright" />
    <meta name="description" content="Descriptions of open job positions at CyberBytes" />
    <meta name="keywords" content="job listings, cyberbytes, applications, employment, software development" />
    <title>Administrator Registration</title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
    <?php include '../header.inc'; ?>
<section class="leftbox">
<h2>Register New Admin</h2>
<form method="post" action="">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br><br>

    <label for="password">Password:</label>
    <input type="text" name="password" id="password" required><br><br>

    <input type="submit" name="register" value="Register">
</form>
</section>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register'])) {
    require_once "../settings.php"; // defines $host, $user, $pwd, $sql_db

    $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$dbconn) {
        echo "<p>Database connection failed.</p>";
        exit;
    }

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<p>Username and password are required.</p>";
        mysqli_close($dbconn);
        exit;
    }

    // Check if username exists
    $check_query = "SELECT id FROM admins WHERE username = ?";
    $stmt = mysqli_prepare($dbconn, $check_query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo "<p>Username already exists.</p>";
    } else {
        // Insert without hashing
        $insert_query = "INSERT INTO admins (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($dbconn, $insert_query);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);

        if (mysqli_stmt_execute($stmt)) {
            echo "<p>Admin account created successfully.</p>";
        } else {
            echo "<p>Error: " . mysqli_error($dbconn) . "</p>";
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($dbconn);
}
?>
<?php include '../footer.inc'; ?>

</body>
</html>
