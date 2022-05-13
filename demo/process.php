<?php
include 'Sql.php';
include 'file_registration_upload.php';


if (isset($_POST) && count($_POST) > 0) {
  // include 'Registration_php_validation.php';
  // if ($error == 0) {
  //   print_r($msg);
  // }

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $conpassword = $_POST['conpassword'];
      $address = $_POST['address'];
      $designation = $_POST['designation'];
      $gender = $_POST['gender'];
      $file = $_FILES['fileToUpload']['name'];
if($password != $conpassword)
{
  //  echo "not matching password";
   header('Location:Registration.php?pass=Password and Confirm Password are not the same');
   exit();
}


    if ($fname != "" && $lname != "" && $email != "" && $password != "" && $conpassword != "" && $address != "" && $designation != "" && $gender != "" && $uploadOk == 1) {
      $query = "INSERT INTO student(fname,lname,email,password,conpassword,address,designation,gender,file) VALUES ('" . $fname . "','" . $lname . "','" . $email . "','" . $password . "','" . $conpassword . "','" . $address . "','" . $designation . "','" . $gender . "','" . $file . "')";
      $data = mysqli_query($conn, $query);
      if ($data) {
        echo "Data Inserted";
        header('Location:login.php');
        echo "<br>";
      } else {

        echo "Data Failed";
        header('Location:Registration.php');
      }
    }
}

