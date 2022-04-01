<?php
 include ("psql.php");
 if(isset($_POST['submit']))
 {
      
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pratice Form</title>
</head>
<body>
  <form method="POST">
    <!--Fname--->
    Firstname
    <input type="text" name="fname" id="fname" placeholder="Enter your name ">
    <br><br>

    <!--Lname-->
    Lastname
    <input type="text" name="lname" id="lname" placeholder="Enter your lastname ">
    <br> <br>

    <!--Password-->
    Password
    <input type="password" name="password" id="password" placeholder="Enter your Password ">
    <br><br>

    <!--CHECKBOX-->

    <input type="checkbox" name="check1" id="c1[]" value="PHP">PHP <br> 
    
    <input type="checkbox" name="check2" id="c1[]" value="JAVA">JAVA <br>
    
    <input type="checkbox" name="check3" id="c1[]" value="REACT">REACT JS
    <br><br>

    <!--button-->

    <input type="submit" value="Submit" >

    


  </form>  

</body>
</html>
