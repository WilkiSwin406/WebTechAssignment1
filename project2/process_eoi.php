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
            $gender = clean_input($_POST["Gender"]);
            $dob = clean_input($_POST["DOB"]);
            $addressStreet = clean_input($_POST["Street"]);
            $addressSuburb = clean_input($_POST["Suburb"]);
            $addressPostcode = clean_input($_POST["Postcode"]);
            $addressState = clean_input($_POST["State"]);
            $phone = clean_input($_POST["Phone"]);

            

            if (empty($fname) || empty($lname)) {
                echo "Error: Your full name is required.<br>";
            }

            if (empty($email)) {
                echo "Error: Your email is required.<br>";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { # this is a check to make sure that the email entered is formatted as an email should be, adding a second check to the pattern already contained within the form entry field
                echo "Error: Invalid email format.<br>";
            }

            if (empty($dob)) {
                echo "Error: Please enter your date of birth.<br>";
            }
            
            if (empty($addressStreet)) {
                echo "Error: Please enter your street address.<br>";
            }

            if (empty($addressSuburb)) {
                echo "Error: Please enter your suburb or town.<br>";
            }

            if (empty($addressPostcode)) {
                echo "Error: Please enter your postcode.<br>";
            }

            if (empty($phone)) {
                echo "Error: Please enter your phone number.<br>";
            }

            switch ($addressState) { // this switch case sanity checks the postcode to make sure it matches with the chosen state
                case "ACT":
                    if (!(($addressPostcode <= 2618) && (2600 <= $addressPostcode) || ($addressPostcode <= 2920) && (2900 <= $addressPostcode)))  {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                    }
                    break;
                case "NSW":
                    if (!(($addressPostcode <= 2599) && (2000 <= $addressPostcode) || ($addressPostcode <= 2899) && (2619 <= $addressPostcode) || ($addressPostcode <= 2999) && (2621 <= $addressPostcode))) {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                    }
                    break;
                case "NT":
                    if (!(($addressPostcode <= 899) && (800 <= $addressPostcode))) {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                    }
                    break;
                case "QLD":
                    if (!(($addressPostcode <= 4999) && (4000 <= $addressPostcode)))  {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                    }
                    break;
                case "SA":
                    if (!(($addressPostcode <= 5799) && (5000 <= $addressPostcode)))  {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                    }
                    break;
                case "TAS":
                    if (!(($addressPostcode <= 7799) && (7000 <= $addressPostcode)))  {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                    }
                    break;
                case "VIC":
                    if (!(($addressPostcode <= 3996) && (3000 <= $addressPostcode))) {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                    }
                    break;
                case "WA":
                    if (!(($addressPostcode <= 6797) && (6000 <= $addressPostcode)))  {
                        echo "Error: Your postcode $addressPostcode does not match your state, $addressState.<br>";
                    }
                    break;
                default: # default case only occurs in case of no state being entered, which should not be possible due to the input being a drop-down box
                    echo "Error: Please enter a state.<br>";
            }

            // echo "$fname<br>";
            // echo "$lname<br>";
            // echo "$email<br>";
            // echo "$dob<br>";
            // echo "$addressStreet<br>";
            // echo "$addressSuburb<br>";
            // echo "$addressPostcode<br>";
            // echo "$addressState<br>";
            // echo "$phone<br>";
            // echo "$gender<br>";








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