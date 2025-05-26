<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Connor Wright" />
    <meta name="description" content="Descriptions of open job positions at CyberBytes" />
    <meta name="keywords" content="job listings, cyberbytes, applications, employment, software development" />
    <title>Administrator Login Page</title>
    <link rel="stylesheet" href="../../styles/styles.css">

</head>
<body>
    <?php include '../header.inc'; ?>
    <br>
    <section class="leftbox">
        <h2>Admin Login</h2>

        <!-- Display login error if it exists -->
        <?php
        if (isset($_SESSION['login_error'])) {
            echo "<p style='color: red;'>" . $_SESSION['login_error'] . "</p>";
            unset($_SESSION['login_error']);
        }
        ?>
        <form action="enhancements.php" method="post">
            Username: <input type="text" name="username" required><br><br>
            Password: <input type="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
    </section>
    <?php include '../footer.inc'; ?>

</body>
</html>
