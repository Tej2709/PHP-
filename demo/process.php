<?php
include 'Sql.php';
if (isset($_POST['submit']) && count($_POST['submit']) > 0) {
  include 'file_registration_upload.php';
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $conpassword = $_POST['conpassword'];
      $address = $_POST['address'];
      $designation = $_POST['designation'];
      $gender = $_POST['gender'];
      $file = $_FILES['fileToUpload']['name'];
// if($password != $conpassword)
// {
//   echo "not matching password";
//    header('Location:Registration.php?pass=Password and Confirm Password are not the same');
//    exit();
// }

// $email = $_GET['email'];
// $query = "SELECT * FROM student where email = '" . $email . "' ";
// $data = mysqli_query($conn, $query);
// if (mysqli_num_rows($data) > 0) {
// header('Location:Registration.php');



    if ($fname != "" && $lname != "" && $email != "" && $password != "" && $conpassword != "" && $address != "" && $designation != "" && $gender != "" &&  $uploadOk == 1) {
      
      $query = "INSERT INTO student(fname,lname,email,password,conpassword,address,designation,gender,file) VALUES ('" . $fname . "','" . $lname . "','" . $email . "','" . $password . "','" . $conpassword . "','" . $address . "','" . $designation . "','" . $gender . "','" . $file . "')";
      echo $query;
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
    else{
      echo "insert required fields";
    }

  }
