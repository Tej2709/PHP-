<?php
require("Sql.php");

if(isset($_POST['submit']))
{
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $conpassword =$_POST['conpassword'];
    $address =$_POST['address'];
    $designation =$_POST['designation'];
    $gender =$_POST['gender'];
    $file =$_FILES['fileToUpload']['name'];


      $target_dir = "./Uploads";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
        echo "File is correct- " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "Invalid File .";
        $uploadOk = 0;
      }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($FileType != "pdf" && $FileType != "doc" && $FileType != "docx" )
     {
      echo "Sorry, only PDF, DOC, & DOCX files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }




    if ($fname !="" && $lname !="" && $email !="" && $password !="" && $conpassword !="" && $address!="" && $designation !="" )
    {

  

    //  $query = "INSERT INTO student values('".$fname."','".$lname."','".$password."','".$conpassword."','".$address."','".$designation."')";

    $query = "INSERT INTO student(fname,lname,email,password,conpassword,address,designation,gender,file) VALUES ('".$fname."','".$lname."','".$email."','".$password."','".$conpassword."','".$address."','".$designation."','".$gender."','".$file."')";
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


//   $data = $_POST;
//   if(count($data)> 0)
//   {
//   foreach($data as $key=>$value){
//     if(empty($value)){
//         $msg= $key . "  Is Required";
//         echo "<br>";
//      echo $msg;
//   }
//  }
//   }
/*echo "<pre>";
echo print_r($data);
echo "</pre>";*/
?>
<?php

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $addressErr =  $designationErr= "";
$name = $email = $gender = $address = $designation = "";

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

  if (empty($_POST["designation"])) {
    $designationErr = "Please Select Designation";
  } else {
    $designation=($_POST["designation"]);
  }

  if(empty($_POST['gender']))
  {
    $genderErr ="Gender is Required";
  }
  else{
    $gender=($_POST["gender"]);
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

  

</head>
<body> 
  <form action="#" method="POST" enctype="multipart/form-data"> 
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
        </div>
        

      <!--PASSWORD-->

      <div class="form-group">
        <div class="input_field">
          <label> Password </label>
          <input type="password" class="input" placeholder="Create Your Password" name="password" id="Password">
        </div>
        <span id="pass_err" class="text-danger"></span>
      </div>

      <!--CONFIRM PASSWORD-->

      <div class="form-group">
        <div class="input_field">
          <label> Confirm Password </label>
          <input type="password" class="input" placeholder="Enter Your Confirm Password" name="conpassword" id="ConPassword">
        </div>
        <span id="conpass_err" class="text-danger"></span>
      </div>
      
      <!--ADDRESS-->

        <div class="form-group">
        <div class="input_field">
          <label> Address</label>
          <textarea rows="3" cols="30" placeholder="Enter Your Address" class="input" name="address" id="Address"> </textarea>
        </div>
        <span id="add_err" class="text-danger "> </span>
        </div>
        

      
      
      <!--Choose Designation-->

     <div class="form-group">
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
      <span id="designation_err" class="text-danger"></span>
     </div>
          <br>

      <!--Gender-->

          <div class="form-group">
              <div class="input_field">
          <label>Gender</label>
           <input type="radio" name="Gender" value="1" >Male
            <input type="radio" name="Gender" value="0">Female 
        </div>
            <span id="gender_err" class="text-danger"></span>
          </div>
            <br> <br>

      <!--File Upload-->
          <div class="input_field">
            <input type="file" id="fileToUpload" name="fileToUpload">
          </div>

      <!--Submit Button-->
          <div class="input_field">
          <input type="submit" class="btn" name="submit" onclick="window.location.href='./login.php';">
          </div>

          <div class="input_field">
            
            <a href="login.php" class="btn">Login</a>
          </div>
  </div>
  </div>
  </form>

</body>
</html>

