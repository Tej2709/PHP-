<?php
    $post = $_POST;
    {
    
        foreach($post as $key => $value) {
    
            if(empty($post[$key])) 
            {
            $message =  $key . " is required!";
            echo $message;  
            }
            else
              echo $value;
              echo "</br>";
        }
    }    

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form </title>



</head>
<body>
    <center>
    			
    <form method="POST">
        
        
        <!--NAME-->

    Name: <input type="text" name="Name" placeholder="Enter Your Name here" > 
    <br> <br>

        <!--ADDRESS-->

        <textarea name="Address" rows="3" cols="30" placeholder="Enter Your Address..."></textarea></br><br>

            <!--GENDER-->

    Gender :<input type="radio" name="Gender" value="Male" >Male
             <input type="radio" name="Gender" value="Female">Female
             <br> <br> <br>

        <!--DESIGNATION-->

    Designation: <select name="Designation">
        <option valule ="">Select Designation </option>
        <option value="project Manager">Project Manager</option>
        <option value="Php devloper">Php Developer</option>
        <option value="java devloper">Java Devloper</option>
        <option value="Ios Devloper">IOS Devloper</option>
    </select>
    <br> <br> <br>

        <!--CONTACT NO -->

    Contact No: <input type="text" maxlength="10" name="ContactNo" placeholder="Enter your Number Here">
    <br>
    <br>

        <!--SUBMIT BUTTON-->
     
    <button type="submit">Submit</button></br>


    </form>
    
    </div>
    </center>
</body>
</html>