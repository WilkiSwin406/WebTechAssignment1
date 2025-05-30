<?php
require_once('settings.php');
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for applying to CyberBytes!</title>
    <link href="../styles/styles.css" rel="stylesheet" />
</head>
<body>
    <?php include 'header.inc'; ?>
    <fieldset> <!-- this is just to make the error messages/confirmation message look neater -->
    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = clean_input($_POST["Fname"]); # all of the input data from the apply.php form is run through a cleaning function which removes 
            $lname = clean_input($_POST["Lname"]); # trailing whitespace and special html characters
            $email = clean_input($_POST["Email"]);
            $dob = clean_input($_POST["DOB"]);
            $addressStreet = clean_input($_POST["Street"]);
            $addressSuburb = clean_input($_POST["Suburb"]);
            $addressPostcode = clean_input($_POST["Postcode"]);
            $addressState = clean_input($_POST["State"]);
            $phone = clean_input($_POST["Phone"]);
            $skills = skills_string();
            $jrn = clean_input($_POST["Job"]);
            $validationSuccessful = True; # this validationSuccessful boolean is True by default, but will be switched to False if any of the input checks fail

            if (empty($fname) || empty($lname)) {
                echo "Error: Your full name is required.<br>";
                $validationSuccessful = False;
            }

            if (empty($email)) {
                echo "Error: Your email is required.<br>";
                $validationSuccessful = False;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { # this is a check to make sure that the email entered is formatted as an email should be, adding a second check to the pattern already contained within the form entry field
                echo "Error: Invalid email format.<br>";
                $validationSuccessful = False;
            }

            

            if (empty($dob)) {
                echo "Error: Please enter your date of birth.<br>";
                $validationSuccessful = False;
            }
            
            if (empty($addressStreet)) {
                echo "Error: Please enter your street address.<br>";
                $validationSuccessful = False;
            }

            if (empty($addressSuburb)) {
                echo "Error: Please enter your suburb or town.<br>";
                $validationSuccessful = False;
            }

            if (empty($addressPostcode)) {
                echo "Error: Please enter your postcode.<br>";
                $validationSuccessful = False;
            }

            if (empty($phone)) {
                echo "Error: Please enter your phone number.<br>";
                $validationSuccessful = False;
            }

            switch ($addressState) { // this switch case sanity checks the postcode to make sure it matches with the chosen state
                case "ACT":
                    if (!(($addressPostcode <= 2618) && (2600 <= $addressPostcode) || ($addressPostcode <= 2920) && (2900 <= $addressPostcode)))  {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                        $validationSuccessful = False;
                    }
                    break;
                case "NSW":
                    if (!(($addressPostcode <= 2599) && (2000 <= $addressPostcode) || ($addressPostcode <= 2899) && (2619 <= $addressPostcode) || ($addressPostcode <= 2999) && (2621 <= $addressPostcode))) {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                        $validationSuccessful = False;
                    }
                    break;
                case "NT":
                    if (!(($addressPostcode <= 899) && (800 <= $addressPostcode))) {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                        $validationSuccessful = False;
                    }
                    break;
                case "QLD":
                    if (!(($addressPostcode <= 4999) && (4000 <= $addressPostcode)))  {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                        $validationSuccessful = False;
                    }
                    break;
                case "SA":
                    if (!(($addressPostcode <= 5799) && (5000 <= $addressPostcode)))  {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                        $validationSuccessful = False;
                    }
                    break;
                case "TAS":
                    if (!(($addressPostcode <= 7799) && (7000 <= $addressPostcode)))  {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                        $validationSuccessful = False;
                    }
                    break;
                case "VIC":
                    if (!(($addressPostcode <= 3996) && (3000 <= $addressPostcode))) {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                        $validationSuccessful = False;
                    }
                    break;
                case "WA":
                    if (!(($addressPostcode <= 6797) && (6000 <= $addressPostcode)))  {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                        $validationSuccessful = False;
                    }
                    break;
            }

            if (!(ctype_alpha($fname))) { # this function and the one directly after use a ctype function to make sure an entered first and last name uses no numbers or special characters
                echo "Error: Your first name must contain only alphabetical characters.<br>";
                $validationSuccessful = False;
            }

            if (!(ctype_alpha($lname))) {
                echo "Error: Your last name must contain only alphabetical characters.<br>";
                $validationSuccessful = False;
            }

            if (strlen($phone) > 12 || strlen($phone) < 8) { # here we use strlen() to get the length of the entered phone number. This one is important because the patterns on the HTML side don't prevent the phone number from being the wrong length like they do with the applicant's names and street/suburb names
                echo "Error: Your phone number should be between 8 and 12 characters long, including spaces.<br>";
                $validationSuccessful = False;
            }

            if (!(only_numbers_or_spaces($phone))) {
                echo "Error: Your phone number should contain only numbers and spaces.<br>";
                $validationSuccessful = False;
            }
            
            if (empty($skills)) {
                echo "Error: Please select at least one technical skill.<br>";
                $validationSuccessful = False;
            }

            if (isset($_POST["Other-skills-checkbox"])) {
                if (isset($_POST["Other-skills"])) {
                    $otherSkills = clean_input($_POST["Other-skills"]);
                    if (empty($otherSkills)) {
                        echo "Error: 'Other Skills' checkbox is selected, but no text is entered in the relevant text box. Please either enter your skills into the text box, or uncheck the checkbox.<br>";
                        $validationSuccessful = False;
                    }
                } else {
                    echo "Error: 'Other Skills' checkbox is selected, but no text is entered in the relevant text box. Please either enter your skills into the text box, or uncheck the checkbox.<br>";
                    $validationSuccessful = False;
                }
            } else {
                $otherSkills = "No other skills entered";
            }

            } else { # if the submitted form method is anything other than "POST", redirect back to apply.php. this should only occur if someone reaches process_eoi.php without submitting the form on apply.php, i.e. through direct link.
                echo "Redirecting...";
                header("Location: apply.php", true, 301);  
                exit();  
            }

            if (isset($_POST["Gender"])) { # this snippet translates the gender input into something readable by our sql database
                $gender = clean_input($_POST["Gender"]);
                switch ($gender) {
                    case 'Male':
                        $gender = 'MALE';
                        break;
                    case 'Female':
                        $gender = 'FEMALE';
                        break;
                    case 'Non-Binary':
                        $gender = 'NON-BINARY';
                        break;
                    case 'Other':
                        $gender = 'OTHER';
                        break;
                    case 'Rather-not-Say':
                        $gender = 'PREFER NOT TO SAY';
                        break;
                }
            } else { # if no gender option is selected, default
                $gender = 'PREFER NOT TO SAY';
            }

            
            if ($validationSuccessful) { # this code creates an eoi table if one does not already exist in the database
                $sql = "CREATE TABLE IF NOT EXISTS eoi                
                        (`EOINumber` int(5) NOT NULL AUTO_INCREMENT,
                        `JRN` varchar(6) NOT NULL,
                        `FirstName` varchar(20) NOT NULL,
                        `LastName` varchar(20) NOT NULL,
                        `Gender` set('MALE','FEMALE','NON-BINARY','OTHER','PREFER NOT TO SAY') NOT NULL,
                        `DOB` date NOT NULL,
                        `StreetAddress` varchar(40) NOT NULL,
                        `Suburb` varchar(40) NOT NULL,
                        `State` set('VIC','ACT','TAS','QLD','NT','SA','WA','NSW') NOT NULL,
                        `Postcode` int(4) NOT NULL,
                        `Email` varchar(99) NOT NULL,
                        `Phone` int(12) NOT NULL,
                        `Skills` varchar(100) NOT NULL,
                        `OtherSkills` text NOT NULL,
                        `Status` set('NEW','CURRENT','FINAL') NOT NULL DEFAULT 'NEW',
                        primary key (EOINumber)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

                if ($conn->query($sql) === TRUE) { # the following code inserts the data into the table, returning a message stating the user's EOI Number
                    
                    $sql2 = "INSERT INTO eoi (JRN, FirstName, LastName, Gender, DOB, StreetAddress, Suburb, State, Postcode, Email, Phone, Skills, OtherSkills)
                        VALUES ('$jrn', '$fname', '$lname', '$gender', '$dob', '$addressStreet', '$addressSuburb', '$addressState', '$addressPostcode', '$email', '$phone', '$skills', '$otherSkills')";
                    if ($conn->query($sql2) === TRUE) {
                        $eoiID = $conn->insert_id; 
                        echo "Your expression of interest form has been submitted, with the ID " . $eoiID . ". Have a nice day!";
                    } else {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            } else {
                echo "Please click <a href='apply.php'>here</a> to return to the previous page.<br>"; # hyperlink back to apply.php is provided if validation fails for any reason
            }

        function clean_input($data) { # this function trims all the unnecessary details off of any data
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
    }

        function only_numbers_or_spaces($string) { # this function checks to see if a string contains only numerical digits or spaces, returning true if it does
            $length = strlen($string);
            while ($length >= 0) {
                $position = strlen($string) - $length;
                $char = substr($string, $position, 1);
                if (!(ctype_space($char) || ctype_digit($char) || empty($char))) {
                    return False;
                }
                $length = $length - 1;
            }
        return True;
    }

        function skills_string() { # this function creates a string in the format "skill1, skill2, skill3, etc" to store in the database as a varchar
            $string = "";
            if (isset($_POST["Cloud-Platform"])) {
                $string = "$string Cloud Platform Knowledge,";
            }
            if (isset($_POST["Networking"])) {
                $string = "$string Digital Networking Knowledge,";
            }
            if (isset($_POST["Security"])) {
                $string = "$string Digital Security Knowledge,";
            }
            if (isset($_POST["Virtualisation"])) {
                $string = "$string Virtualisation,";
            }
            if (isset($_POST["Programming"])) {
                $string = "$string Programming,";
            }
            if (isset($_POST["Database"])) {
                $string = "$string Data Base Creation & Management,";
            }
            if (isset($_POST["Automation-Tools"])) {
                $string = "$string Automation Tools,";
            }
            if (isset($_POST["UI-UX"])) {
                $string = "$string UI & UX Understanding,";
            }
            if (!(empty($string))) { # this lil section cuts off the first and last characters from the string. all it really does is make it look nicer in the database, otherwise it would begin with a space and end with a comma
                $string = substr($string, 0, -1);
                $string = substr($string, 1);
            }
            return $string;
        }

    ?> 
</fieldset>
</body>
</html>