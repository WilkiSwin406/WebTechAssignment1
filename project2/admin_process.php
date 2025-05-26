<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    
    if ($username === 'admin' && $password === 'reallysecure') {
        $_SESSION['user'] = $username;
        header('Location: admindb.php');
        exit();
    } else {
        echo '<p style="color:red;">Invalid Administrator details.</p>';
        echo '<a href="admin.php">Return</a>';
    }
} else {
   
    header('Location: admin.php');
    exit();
}