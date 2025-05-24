<!DOCTYPE html> <!-- the document is html 5 -->
<html lang="en"> <!-- the default language of the document is english-->
<head> <!-- contains all the pages meta information (information the user cannot see)-->
    <meta charset="UTF-8"> <!-- what character set is being used-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- manages the width and height of the page depending on what platform and device is being used to see the page-->
    <title>CyberBytes Application</title> <!-- what the website page is called on the tabs bar-->
    <link rel="stylesheet" href="../styles/styles.css"> <!-- Links the css style sheet to this html doc-->
</head> <!-- end of the head section-->
<?php include 'header.inc'?>;
        <br>
        <br>
<form action="process_eoi.php" method="post" novalidate="novalidate"> <!-- everything inside the form tag is a form and the method of post sends all informtation collected to the action link-->
    <fieldset> <!-- everything inside a field set tag is seperated from the rest of the page and other field sets for data management and UX-->
            <!--the title of the field set is defined by legend-->
            <legend>Applicant Details</legend>
            <!-- label is the text connected to an input through the for tag-->
            <!-- text input with name and id connected for formating and CSS, required tag makes the user fill it out-->
            <!-- pattern tag allows for the management of what can be put into each section-->
            <!-- radio inputs are buttons that can be pressed but only allows one to be pressed out of the whole group at any given time-->
             <!-- the value tag inside a radio button dictates what the final radio button selected will be known as when the information is sent-->
              <!-- placeholder tag allows for text to be shows when the space is empty to communicate to the user what the input should look like or any comments that are not easily known-->
        <br>
        <br>
        <div class="text-group">
            <label for="Fname">First Name:</label>
            <input type="text" name="Fname" id="Fname" required="required" pattern="[A-Za-z]+" maxlength="20" minlength="2">
            <Label for="Lname">Last Name:</Label>
            <input type="text" name="Lname" id="Lname" required="required" pattern="[A-Za-z]+" maxlength="20" minlength="2">
            <Label for="Email">Email Address:</Label>
            <input type="text" name="Email" id="Email" required="required" placeholder="eg. Darcy@Coolfirstname.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"> <!-- patter tag was created through the use of Generative AI from https://chatgpt.com/. prompt used was "make me an html pattern that would work for most email addresses"-->
        </div>
        <br>
        <div class="radio-group">
            <p>Gender:</p>
            <label for="Male" class="radio-label">Male</label>
            <input type="radio" class="radio-option" name="Gender" id="Male" value="Male"> 
            <label for="Female" class="radio-label">| Female</label>
            <input type="radio"  class="radio-option" name="Gender" id="Female" value="Female"> 
            <label for="Non-Binary" class="radio-label">| Non-Binary</label>
            <input type="radio" class="radio-option"  name="Gender" id="Non-Binary" value="Non-Binary"> 
            <label for="Other" class="radio-label">| Other</label>
            <input type="radio"  class="radio-option" name="Gender" id="Other" value="Other"> 
            <label for="Rather-not-Say" class="radio-label">| Rather not Say</label>
            <input type="radio" class="radio-option" name="Gender" id="Rather-not-Say" value="Rather-not-Say"> 
        </div>
        <br>
        <div class="text-group">
            <label for="DOB">Date of Birth:</label>
            <input type="Date" name="DOB" id="DOB" required> <!-- a date input -->
        </div>
    </fieldset>
    <fieldset>
        <legend>Applicant Address</legend>
            <br>
            <br>
            <div class="text-group">
                <label for="Street">Street:</label>
                <input type="text" name="Street" id="Street" required="required" placeholder="eg. 12 Street St, apt 3" pattern="^[0-9]{1,6}\s+[A-Za-z\s]+$" maxlength="40" >
                <label for="Suburb">Suburb:</label>
                <input type="text" name="Suburb" id="Suburb" required="required" pattern="[A-Za-z.]+" maxlength="40">
                <label for="Postcode">Postcode:</label>
                <input type="text" name="Postcode" id="Postcode" required="required" pattern="[0-9]{4}">
                <label for="Phone">Phone Number:</label>
                <input type="text" name="Phone" id="Phone" required="required" placeholder="eg. 9555 4829" pattern="[0-9]{8-12}">
                <label for="State">State:</label>
                <select name="State" id="State"> <!-- this creates a drop down menu, each option and value is a seperate opton-->
                    <option value="ACT">ACT</option>
                    <option value="NSW">NSW</option>
                    <option value="NT">NT</option>
                    <option value="QLD">QLD</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="VIC">VIC</option>
                    <option value="WA">WA</option>
              </select>
            </div>
    </fieldset>
    <fieldset>
        <legend>Jobs Selection</legend>
        <br><br>
        <div class="text-group">
            <label for="Job">Job:</label>
                <select name="Job" id="Job">
                <option value="CLE01">CLE01</option>
                <option value="DBE01">DBE01</option>
                <option value="DTA02">DTA02</option>
                <option value="UXD01">UXD01</option>
              </select>
        </div>
        <div class="input-check">
            <h4>Applicant Skills</h4>
              <label for="Cloud-Platform">Cloud Platform Knowledge</label>
              <input type="checkbox" id="Cloud-Platform" name="Cloud-Platform" value="Yes"> <br> <!-- a checkbox allows other checkboxes to be checked instead of only one with a radio button-->
              <label for="Networking">Digital Networking Knowledge</label>
              <input type="checkbox" id="Networking" name="Networking" value="Yes"> <br>
              <label for="Security">Digital Security Knowledge</label>
              <input type="checkbox" id="Security" name="Security" value="Yes"> <br>
              <label for="Virtualisation">Virtualisation</label>
              <input type="checkbox" id="Virtualisation" name="Virtualisation" value="Yes"> <br>
              <label for="Programming">Programming</label>
              <input type="checkbox" id="Programming" name="Programming" value="Yes"> <br>
              <label for="Database">Data Base Creation & Management</label>
              <input type="checkbox" id="Database" name="Database" value="Yes"> <br>
              <label for="Automation-Tools">Automation Tools</label>
              <input type="checkbox" id="Automation-Tools" name="Automation-Tools" value="Yes"> <br>
              <label for="UI-UX">UI & UX understanding</label>
              <input type="checkbox" id="UI-UX" name="UI-UX" value="Yes" > <br>
              <label for="Other-skills-checkbox">Other Skills (Please check box, then write in text box)</label>
              <input type="checkbox" id="Other-skills-checkbox" name="Other-skills-checkbox" value="Yes" > <br>
              <textarea name="Other-skills" id="Other-skills"  placeholder="Your skills here..."></textarea>
        </div>
    </fieldset>


<br>
    <!-- submits the data entered and then follows the action and method-->
<input type="submit" class="buttons" value="Apply">
<!-- resets all the current inputs-->
<input type="reset" class="buttons" value="Reset">
</form>
 <br><br>
<?php include 'footer.inc'?>;
</html>