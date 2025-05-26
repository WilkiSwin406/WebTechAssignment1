<?php
    echo"<!DOCTYPE html>
    <html lang='en'>
    <head>
    <meta charset='utf-8' />
    <meta name='description' content='the managment page for the IT company CyberBytes' />
    <meta name='keywords' content='CyberBytes, managment, info tech , web design' />
    <meta name='author' content='Swinburne Sigmas'  />
    <title>CyberBytes managment</title>
  
    <link rel='stylesheet' href='../styles/styles.css'>
    </head>";
    include 'header.inc';
    require_once ("settings.php");
    $dbconn = mysqli_connect($host, $user, $pwd, $sql_db);
    
    if (!$conn){
        die("Database connection failed: ".mysqil_connect_error());
    }
    echo "<body> 
        <main class= main-content>
        <section class='home-box'>";

    if ($_SERVER["request_method"] = "POST")
    {
        if (isset($_POST["status"]) AND $_POST["eoi"] != NULL)
        {
            $eoi = $_POST["eoi"];
            $status = $_POST["status"];
            switch ($status)
            {
                case "NEW":
                    $query = "UPDATE eoi SET Status = 'NEW' WHERE EOINumber = '$eoi'";
                    mysqli_query($dbconn, $query);
                    break;
                case "CURRENT":
                    $query = "UPDATE eoi SET Status = 'CURRENT' WHERE EOINumber = '$eoi'";
                    mysqli_query($dbconn, $query);
                    break;
                case "FINAL":
                    $query = "UPDATE eoi SET Status = 'FINAL' WHERE EOINumber = '$eoi'";
                    mysqli_query($dbconn, $query);
                    break;

            }
            echo "<p>eoi has been updated</p>";

        }
    }
        echo "</section>
    </main>
    </body>";
    include 'footer.inc';
?>