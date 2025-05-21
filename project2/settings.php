<?php
$host = "localhost";         // because XAMPP runs the server locally
$user = "root";          // default username for XAMPP's MySQL
$pwd = "";              // default password is empty in XAMPP
$sql_db = "swiburnesigmas_db";  // replace with the actual name of your database
?>

<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "swinburnesigmas_db"; // Replace with your actual DB name

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>