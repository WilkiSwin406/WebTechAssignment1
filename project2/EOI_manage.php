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
        if (isset($_POST["eoi_managment_type"]))
        {
            if ($_POST["eoi_managment_type"] == "list_all")
            {
                $query = "SELECT * FROM eoi";
                $result = mysqli_query($dbconn, $query);
            
                if ($result) {

                    echo "<table border='1'>";
                    echo "<tr>
                            <th>EOI Number</th>
                            <th>JRN</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Street Address</th>
                            <th>Suburb</th>
                            <th>State</th>
                            <th>Postcode</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Skills</th>
                            <th>Other Skills</th>
                            <th>Status</th>
                        </tr>";
                
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['EOINumber']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['JRN']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['DOB']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['StreetAddress']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Suburb']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['State']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Postcode']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Phone']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Skills']) . "</td>";
                        echo "<td>" . nl2br(htmlspecialchars($row['OtherSkills'])) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Status']) . "</td>";
                        echo "</tr>";
                    }
                
                echo "</table>";
                mysqli_free_result($result);}
            }elseif (isset($_POST["extra_info"]) and $_POST["extra_info"] != null)
            {
                $info = $_POST["extra_info"];
                switch ($_POST["eoi_managment_type"])
                {   
                    case "list_position": #list EOIs for position
                        $query = "SELECT * FROM eoi WHERE JRN = '$info'";
                        $result = mysqli_query($dbconn, $query);
                        echo "list_position";
                        echo "<table border='1'>";
                        echo "<tr>
                            <th>EOI Number</th>
                            <th>JRN</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Street Address</th>
                            <th>Suburb</th>
                            <th>State</th>
                            <th>Postcode</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Skills</th>
                            <th>Other Skills</th>
                            <th>Status</th>
                            </tr>";
                
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['EOINumber']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['JRN']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['DOB']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['StreetAddress']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Suburb']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['State']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Postcode']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Phone']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Skills']) . "</td>";
                            echo "<td>" . nl2br(htmlspecialchars($row['OtherSkills'])) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Status']) . "</td>";
                            echo "</tr>";
                        }
                
                        echo "</table>";
                        mysqli_free_result($result);

                        break;
                    case "delete_position":
                        echo "Position Deleted";
                        $query = "DELETE FROM eoi WHERE JRN = '$info'";
                        mysqli_query($dbconn, $query);
                        break;
                    case "list_applicant": #list EOIs for indiviual
                        echo "list_applicant";
                        if (!strpos($info," "))
                        {
                            $query = "SELECT * FROM eoi WHERE firstname = '$info' OR lastname = '$info'";
                        }
                        else 
                        {   
                            $name = explode(' ',$info);
                            $query = "SELECT * FROM eoi WHERE firstname = '$name[0]' AND lastname = '$name[1]'";
                        }
                        $result = mysqli_query($dbconn, $query);
                        echo "list_position";
                        echo "<table border='1'>";
                        echo "<tr>
                            <th>EOI Number</th>
                            <th>JRN</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Street Address</th>
                            <th>Suburb</th>
                            <th>State</th>
                            <th>Postcode</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Skills</th>
                            <th>Other Skills</th>
                            <th>Status</th>
                            </tr>";
                
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['EOINumber']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['JRN']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['DOB']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['StreetAddress']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Suburb']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['State']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Postcode']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Phone']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Skills']) . "</td>";
                            echo "<td>" . nl2br(htmlspecialchars($row['OtherSkills'])) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Status']) . "</td>";
                            echo "</tr>";
                        }
                
                        echo "</table>";
                        mysqli_free_result($result);
                        break;
                }
            
            
            
            
            
            
            
            }else
            {

            }
        }else
        {

        }
    }
    echo "</section>
    </main>
    </body>";
?>