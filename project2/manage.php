<?php
session_start();

if (empty($_SESSION['admin_logged_in'])) {
    $_SESSION['message'] = "log in to access data base";
    header("Location: ../enhancements/enhancements.php");  // Adjust path if needed
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="the managment page for the IT company CyberBytes" />
  <meta name="keywords" content="CyberBytes, managment, info tech , web design" />
  <meta name="author" content="Swinburne Sigmas"  />
  <title>CyberBytes managment</title>
  
  <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
  <?php include 'header.inc';?>
  <main class= "main-content">
        <section class="home-box">
          <h2>Manage Expressions Of Interests</h2>

          <form action="EOI_manage.php" method = "post"><!--list all eois-->
            <div class = "manage-radio-group">
              <label for = "list_all" >List All EOIs(give nothing)</label>
              <input type = "radio" id = "list_all" name = "eoi_managment_type" value ="list_all"><br>
              
              <label for = "list_position">List EOIs for a job position (give job refrence number)</label>
              <input type = "radio" id = "list_position" name = "eoi_managment_type" value ="list_position"><br>
              
              <label for = "delete_position">delete EOIs for a job position (give job refrence number)</label>
              <input type = "radio" id = "delete_position" name = "eoi_managment_type" value ="delete_position"><br>
              
              <label for = "list_applicant">List EOIs for a applicant(give firstname or lastname or both)</label>
              <input type = "radio" id = "list_applicant" name = "eoi_managment_type" value ="list_applicant"><br>

            </div> 
            <div class = "manage-radio-group">
              <label for = "extra_info">enter required info</label>
              <input type = "text" id = "extra_info" name = "extra_info"> <br>
              
              
            </div>
            <input type = 'submit' class = "manage-submit">

          </form>
          <h2>Change status of specific EOI</h2>
          <p>select new status</p>
          <form action="change_status_of_EOI.php" method = "post">
            <div class = "manage-radio-group">
              <label for = "new">New</label>
              <input type = "radio" id = "new" name = "status" value ="NEW"><br>
              
              <label for = "current">Current</label>
              <input type = "radio" id = "current" name = "status" value ="CURRENT"><br>
              
              <label for = "final">Final</label>
              <input type = "radio" id = "final" name = "status" value ="FINAL"><br>          

            </div>
            <div class = "manage-radio-group">
              <label for = "eoi">enter EOI number</label>
              <input type = "text" id = "eoi" name = "eoi"> <br>
            </div>
            <input type = 'submit'>
          </form>
        </section>
  </main>
  <?php include 'footer.inc'; ?>
</body>