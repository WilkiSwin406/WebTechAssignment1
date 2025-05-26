<?php
    require_once ("../settings.php");
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    
    if (!$conn){
        die("Database connection failed: ".mysqil_connect_error());
    }


    if ($_SERVER["request_method"] = "POST")
    {
        if (isset($_POST["eoi_managment_type"]))
        {
            if ($_POST["eoi_managment_type"] == "list_all")
            {
                echo "list all";
                $query = "SELECT * FROM ";
            }elseif (isset($_POST["extra_info"]) and $_POST["extra_info"] != null)
            {
                switch ($_POST["eoi_managment_type"])
                {   
                    case "list_position": #list EOIs for position
                        echo "list_position";

                        break;
                    case "delete_position": #list EOIs for indiviual
                        echo "delete_position";
                        break;
                    case "list_applicant":
                        echo "list_applicant";
                        break;
                }
            
            
            
            
            
            
            
            }else
            {

            }
        }else
        {

        }
    }
?>