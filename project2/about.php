<!DOCTYPE html> <!-- Declare document as HTML5-->

<html lang="en"> <!-- specifies language as English-->

<head> <!-- Contains meta-information about the webpage-->
    <meta charset="UTF-8"> <!-- UTF8 character encoding, allows most characters and symbols-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Ensures page works on all devices-->
    <meta name="description" content="About page detailing members of team project"> <!-- Describes the page-->
    <title>About CyberBytes</title> <!--Sets browser tab title-->
    <link rel="stylesheet" href="../styles/styles.css"> <!-- Links the CSS file to the page-->
</head>

<body>

   <?php include 'header.inc'?>;
    
    <main class="main-content">

        <section class="hidden-box">
            <section class="leftbox">
                <h2>Project Contributors</h2>
                <dl> <!-- Definition List-->
                    <dt><strong>Darcy:</strong></dt>
                    <dd>- Index page</dd>
                    <dd>- Manage page</dd>

                    <dt><strong>Flynn:</strong></dt>
                    <dd>- Job Apply page</dd>
                    <dd>- .inc parts of code</dd>
                    <dd>- settings.php</dd>

                    <dt><strong>Connor:</strong></dt>
                    <dd>- Position descriptions page</dd>
                    <dd>- EOI table and validation</dd>

                    <dt><strong>Benjamin:</strong></dt>
                    <dd>- About page</dd>
                    <dd>- Update About page</dd>
                    <dd>- Dynamic job descriptions</dd>
                </dl>

                <h2>Group: Swinburne Sigmas</h2>
                <p><strong>Class:</strong> Wednesday 10:30-12:30</p>
                <p><strong>Tutor:</strong> Rahul Raghavan</p>
            </section>

            <section class="rightbox">

                <section class="image-section">
                    <div>
                        <img src="../images/group.png" alt="Group photo of the team" class="actual-image">
                        <div class="caption-right">Group Photo</div>
                        <div class="caption-center">Darcy, Flynn, Benjamin, Connor</div>
                    </div>
                </section>
                
                <section class="right-section">
                    <h2>Students</h2>
                    <ul> <!-- Unordered List -->
                        <li>Darcy Doyle - <strong>105920569</strong></li>
                        <li>Flynn Reimers - <strong>105924529</strong></li>
                        <li>Connor Wright - <strong>105748677</strong></li>
                        <li>Benjamin Wilkinson - <strong>105927777</strong></li>
                    </ul>
                </section>
                
            </section>

        </section>
        
        

        <section class="table-box">
            <section class="grid-item">
                <table class="table">
                    <caption class="big-text"><strong>About Us</strong></caption>
                    <tr>
                        <th>Name</th>
                        <th>Favourite Movie</th>
                        <th>Favourite Book</th>
                        <th>Favourite Colour</th>
                        <th>Favourite Programming Language</th>
                    </tr>
                    <tr class="ben-row">
                        <td>Benjamin</td>
                        <td>Mad Max Fury Road</td>
                        <td>Meditations</td>
                        <td>Purple</td>
                        <td>Python</td>
                    </tr>
                    <tr class="connor-row">
                        <td>Connor</td>
                        <td>Cloudy With the Chance Of Meatballs</td>
                        <td>A Song of Ice And Fire</td>
                        <td>Lavender</td>
                        <td>Python</td>
                    </tr>
                    <tr class="darcy-row">
                        <td>Darcy</td>
                        <td>Toy Story</td>
                        <td>Scythe</td>
                        <td>Blue</td>
                        <td>C#</td>
                    </tr>
                    <tr class="flynn-row">
                        <td>Flynn</td>
                        <td>Real Steel</td>
                        <td>Ready Player One</td>
                        <td>Burgundy</td>
                        <td>C#</td>
                    </tr>
                </table>
            </section>
        </section>
        
        

        <!--
        This chunk of code is a section that will contain a photo of each students Discord profile picture, their first name and Student ID
        it uses a main container and then each person gets their own container.
        -->

        <section class="info-section single-box">
            <section class="grid-container">
                <section class="grid-item">
                    <section class="person-header">
                        <img src="../images/benjamin.png" alt="Benjamin" width="50" height="50">
                        <h3>Benjamin</h3>
                    </section>
                    <p>105927777</p>
                </section>

                <section class="grid-item">
                    <section class="person-header">
                        <img src="../images/darcy.png" alt="Darcy" width="50" height="50">
                        <h3>Darcy</h3>
                    </section>
                    <p>105920569</p>
                </section>

                <section class="grid-item">
                    <section class="person-header">
                        <img src="../images/connor.png" alt="Connor" width="50" height="50">
                        <h3>Connor</h3>
                    </section>
                    <p>105748677</p>
                </section>

                <section class="grid-item">
                    <section class="person-header">
                        <img src="../images/flynn.png" alt="Flynn" width="50" height="50">
                        <h3>Flynn</h3>
                    </section>
                    <p>105924529</p>
                </section>

            </section>

        </section>
        
    </main>

   <?php include 'footer.inc'?>;
    
</body>

</html>