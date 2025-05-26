<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="the managment page for the IT company CyberBytes" />
  <meta name="keywords" content="CyberBytes, managment, info tech , web design" />
  <meta name="author" content="Swinburne Sigmas"  />
  <title>CyberBytes managment</title>
  
  <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
  <header class="site-header">
    <div class="logo-title">
        <img src="../images/logo.png" alt="CyberBytes Logo" class="logo-image"><!-- made with open ai with the prompt "cartoon gear with bite tacken ot of it"-->
        <h1>CyberBytes</h1>
    </div>

    <nav class="nav-links">
        
        <a href="../index.php">Index</a>
        <a href="../jobs.php">Jobs</a>
        <a href="../apply.php">Apply</a>
        <a href="../about.php">About</a>
        <a href="mailto:webtechprojectteam@gmail.com">Contact us</a>
    </nav>
  </header>
  <main class= main-content>
        <section class="home-box">
          <h2>Manage Expressions Of Interests</h2>

          <form action="EOI_manage.php" method = "post"><!--list all eois-->
            <div class = "manage-radio-group">
              <label for = "list_all" >List All EOIs(give nothing)</label>
              <input type = "radio" id = "list_all" name = "eoi_managment_type" value ="list_all"><br>
              
              <label for = "">List EOIs for a job position (give job refrence number)</label>
              <input type = "radio" id = "list_position" name = "eoi_managment_type" value ="list_position"><br>
              
              <label for = "">delete EOIs for a job position (give job refrence number)</label>
              <input type = "radio" id = "delete_position" name = "eoi_managment_type" value ="delete_position"><br>
              
              <label for = "">List EOIs for a applicant(give firstname or lastname or both)</label>
              <input type = "radio" id = "list_applicant" name = "eoi_managment_type" value ="list_applicant"><br>

             
            </div> 
            <div class = "manage-radio-group">
              <label for = "extra_info">enter required info</label>
              <input type = "text" id = "extra_info" name = "extra_info"> <br>
              
              
            <div>
            <input type = 'submit' class = "manage-submit">

          </form>
        </section>
  </main>

    <!--<form action = ""> <!-change status eoi->
    
  
  
    </form>-->
</body>