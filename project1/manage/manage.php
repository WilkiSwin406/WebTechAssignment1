<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="the managment for the IT company CyberBytes" />
  <meta name="keywords" content="CyberBytes, managment, info tech , web design" />
  <meta name="author" content="Swinburne Sigmas"  />
  <title>CyberBytes managment</title>
  
  <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <form action="EOI_manage.php" method = "post"><!--list all eois-->
      <label for = "all">List All EOIs(give nothing)</label>
      <input type = "radio" id = "list_all" name = "eoi_managment_type" value ="list_all"><br>
      
      <label for = "">List EOIs for a job position (give job refrence number)</label>
      <input type = "radio" id = "list_position" name = "eoi_managment_type" value ="list_position"><br>
      
      <label for = "">delete EOIs for a job position (give job refrence number)</label>
      <input type = "radio" id = "delete_position" name = "eoi_managment_type" value ="delete_position"><br>
      
      <label for = "">List EOIs for a applicant(give firstname or lastname or both)</label>
      <input type = "radio" id = "list_applicant" name = "eoi_managment_type" value ="list_applicant"><br>
      
      <label for = "extra_info">enter required info</label>
      <input type = "text" id = "extra_info" name = "extra_info">
      <input type = 'submit'>
    </form>

    <!--<form action = ""> <!-change status eoi->
    
  
  
    </form>-->
</body>