<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing...</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = clean_input($_POST["Fname"]);
            $lname = clean_input($_POST["Lname"]);
            $email = clean_input($_POST["Email"]);
            

            if (empty($fname) || empty($lname)) {
                echo "Your full name is required.<br>";
            }



  }

        function clean_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
    }
    ?> 
</body>
</html>