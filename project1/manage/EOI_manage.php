<?php
    require_once ("settings.php");
    #$conn = mysqli_connect($host, $user, $pwd, $sql_db);
    
    #if (!$conn){
    #    die("Database connection failed: ".mysqil_connect_error());
    #}


    if ($_SERVER["request_method"] = "POST")
    {
        if (isset($_POST["eoi_managment_type"]))
        {
            if $_POST["eoi_managment_type"] == "list_all"
            {
                $query = "SELECT * FROM "
            }elseif isset($_POST["eoi_managment_type"])
            {
                switch ($_POST["eoi_managment_type"])
                {   
                    case "list_position": #list EOIs for position


                        break
                    case "delete_position" #list EOIs for indiviual

                        break
                    case "list_applicant"
                        
                        break
                }
            
            
            
            
            
            
            
            }else
            {

            }
        }else
        {

        }
    }
?>