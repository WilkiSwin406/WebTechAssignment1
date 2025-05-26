<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Connor Wright" />
    <meta name="description" content="Descriptions of open job positions at CyberBytes" />
    <meta name="keywords" content="job listings, cyberbytes, applications, employment, software development" />
    <title>EOI Records</title>

    <link href="../styles/styles.css" rel="stylesheet" />
</head>
<body>

    <?php include 'header.inc'; ?>

    <?php 
        require_once "settings.php"; // This file must define $host, $user, $pwd, and $sql_db = "swinburnesigmas_db";

        $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
        
        if ($dbconn) {
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
                mysqli_free_result($result);
            } else {
                echo "<p>Query failed: " . mysqli_error($dbconn) . "</p>";
            }
            
            mysqli_close($dbconn);
        } else {
            echo "<p>Unable to connect to the database.</p>";
        }
    ?>
    <?php include 'footer.inc'; ?>
</body>
</html>
