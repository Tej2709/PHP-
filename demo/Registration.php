<?php
require("Sql.php");
/*if($_POST['submit'])
{
  $fname  = $_POST['fname'];
  $lname  = $_POST['lname'];
  $email  = $_POST['email'];
  $password   = $_POST['password'];
  $conpassword = $_POST['conpassword'];
  $address = $_POST['address'];
  $designation = $_POST['designation'];


  $query = "INSERT INTO student values('$fname','$lname','$email','$password','$conpassword','$address','$designation')";
  $data = mysqli_query($conn,$query);
  if($data)
  {
    echo "Data inserted";
  }
  else
  {

    echo "Data Failed";
  }
}*/

if(isset($_POST['submit']))
{
  $fname =$_POST['fname'];
  $lname =$_POST['lname'];
  $email =$_POST['email'];
  $password =$_POST['password'];
  $conpassword =$_POST['conpassword'];
  $address =$_POST['address'];
  $designation =$_POST['designation'];


  if ($fname !="" && $lname !="" && $email !="" && $password !="" && $conpassword !="" && $address!="" && $designation !="" )
  {

  

    //  $query = "INSERT INTO student values('".$fname."','".$lname."','".$password."','".$conpassword."','".$address."','".$designation."')";

    $query = "INSERT INTO student(fname,lname,email,password,conpassword,address,designation,gender) VALUES ('".$fname."','".$lname."','".$email."','".$password."','".$conpassword."','".$address."','".$designation."','".$gender."')";
    //echo $query; exit;
    $data = mysqli_query($conn,$query);
    if($data)
    {
      echo "Data Inserted"; 
      echo "<br>";
    }
    else
      {
    echo "Data Failed";
    }
  }

  else 
  {
    
    echo "<script> alert('Please Fill the form');  </script>";
  }
}


$data = $_POST;
if(count($data)> 0){
  foreach($data as $key=>$value){
    if(empty($value)){
        $msg= $key . "  Is Required";
        echo "<br>";
     echo $msg;
}
 }
}
/*echo "<pre>";
echo print_r($data);
echo "</pre>";*/
?>
<?php

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $addressErr = $mobilenoErr = $designationErr= "";
$name = $email = $gender = $address = $designation = $mobileno= "";

//if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (empty($_POST["fname"])) {
    $nameErr = "Name is Required";
  } else {
    $name = ($_POST["fname"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is Required";
  } else {
    $email =($_POST["email"]);
  }

  if (empty($_POST["address"])) {
    $addressErr = "Address is Required";
  } else {
    $address =($_POST["address"]);
  }

  if (empty($_GET["designation"])) {
    $designationErr = "Please Select Designation";
  } else {
    $designation=($_POST["designation"]);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link href="./bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="./style.css">

  <script type="text/javascript">

    function validation()
    {
      var fname = document.getElementById('Fname').value;
      var lname = document.getElementById('Lname').value;
      var email = document.getElementById('Email').value;
      var password = document.getElementById('Password').value;
      var conpassword = document.getElementById('ConPassword').value;
      var address = document.getElementById('Address').value;


      if(fname=="")
      {
        document.getElementById('name_error').innerHTML="Please fill the first Name field ";
        return false;

      }

      if(lname=="")
      {
        document.getElementById('lastname').innerHTML="Please fill last name field";
        return false;

      }

      if(email=="")
      {
        document.getElementById('email_err').innerHTML="Please fill the Email field ";
        return false;

      }

      if(password=="")
      {
        document.getElementById('pass_err').innerHTML="Please Enter the password ";
        return false;

      }

      if(conpassword=="")
      {
        document.getElementById('conpass_err').innerHTML="Please enter the   Password ";
        return false;

      }

      /*if(address=="")
      {
        document.getElementById('address_error').innerHTML="Please fill the Required field ";
        return false;

      }*/


    }
    


    </script>

</head>
<body> 
  <form action="#" method="POST" onsubmit="return validation()"> 
  <div class="container">
    <div class="title">
      Registration Form 
    </div>

    <div class="form">
      <!--FIRST NAME-->  
      <div class="form-group">
          <div class="input_field">
            <label> First Name </label>
            <input type="text" class="input" placeholder="Enter Your First Name" name="fname" id="Fname" autocomplete="off">
          </div>
          <span id="name_error"  class="text-danger"></span>
      </div>

      
      <!--LAST NAME-->
      <div class="form-group">
        <div class="input_field">
          <label> Last Name </label>
          <input type="text" class="input" placeholder="Enter Your Last Name" name="lname" autocomplete="off" id="Lname">
        </div>
        <span id="lastname"  class="text-danger"></span>
      </div>
      

      <!--EMAIL-->
        <div class="form-group">
        <div class="input_field">
          <label> Email </label>
          <input type="email" class="input" placeholder="Enter Your Email Here." name="email" id="Email">
        </div>
        <span id="email_err" class="text-danger"></span>
        

      <!--PASSWORD-->
      <div class="form-group">
        <div class="input_field">
          <label> Password </label>
          <input type="password" class="input" placeholder="Create Your Password" name="password" id="Password">
        </div>
        <span id="pass_err" class="text-danger"></span>
        

      <!--CONFIRM PASSWORD-->
      <div class="form-group">
        <div class="input_field">
          <label> Confirm Password </label>
          <input type="password" class="input" placeholder="Enter Your Confirm Password" name="conpassword" id="ConPassword">
        </div>
        <span id="conpass_err" class="text-danger"></span>
      </div>
        
      
     

      <!--ADDRESS-->
        <div class="input_field">
          <label> Address</label>
          <textarea rows="3" cols="30" placeholder="Enter Your Address" class="input" name="address" id="Address"> </textarea>
        </div>
        

      
      
      <!--Choose Designation-->
     <div class="input_field">
      Designation:  
          <select name="designation" class="designation" name="designation">
            <option value="">Select Your Designation</option>
            <option value="Project Manager">Project Manager </option>
            <option value="Jr Developer">Jr Developer</option>
            <option value="Sr Developer">Sr Developer</option>
            <option value="Human Resources">Human Resources</option>
          </select>
     </div>
          <br>

      <!--Gender-->
          <label>Gender</label>
           <input type="radio" name="Gender" value="Male"  >Male
            <input type="radio" name="Gender" value="Female">Female  

            <br> <br>

          <div class="input_field">
          <input type="submit" class="btn" name="submit" onsubmit="return display.php">
          </div>

          <div class="input_field">
            
            <a href="login.php" class="btn">Login</a>
          </div>
  </div>
  </div>
  </form>

</body>
</html>

