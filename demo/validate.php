<?php
    echo"<pre>";
    print_r($_POST);
    echo "</pre>";


    $data=$_POST;
    
    if(count($data)>0)
    {
        foreach($data as $key=>$value)
        {
            if(empty($value))
            {
                $mssg= $key ."is required";
                echo $mssg;
            }
            else
            {
                echo "Thank You";
            }
        }
    }
    
    
    





?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    
</head>
<body>
        
    <form method="POST">

        <!--NAME-->
        <b>Name</b>
        <input type="text" name="name" placeholder="Enter your name here">
        <br>

        
        <!--GENDER--> 
        <b>Gender</b><br>
        <input type="radio" id="male" name="gender" value="male">
        <label>Male</label><br>
        <input type="radio" id="male" name="gender" value="female">
        <label>Female</label><br>

        <!---Designation-->

        <b>Designation</b>
        <br>
        <select>
            <option value="">Select Option</option>
            <option value="project" >Project Manager</option>
            <option value="php">Php Developer</option>
            <option value="java">java Developer</option>
        </select><br>


        <!--Address-->
        <b>Address</b>
        <textarea id="txtadress" name="address" rows="4" cols="10">
        </textarea>
        <br>



        <!--Contact No -->
        <b>Contact No</b>
        <input type="text" id="contno" placeholder="Enter your Contact number here" maxlength="10">
        <br>

        <input type="submit">


    </form>
    
    
</body>
</html>