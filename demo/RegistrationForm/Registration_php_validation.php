<?php

    $data = $_POST;
    $error= 0;
    if(count($data)> 0)
    {
    foreach($data as $key=>$value){
      if(empty($value)){
          $msg= $key . "  Is Required";
          echo "<br>";
          $error =0;
        }
          else{
            $error = 1 ;
          }
        echo $msg;
     }
    }
  

// define variables and set to empty values
$nameErr = $lnameErr = $emailErr = $passErr = $conpassErr = $genderErr = $addressErr =  $designationErr= "";
$name = $lname = $email = $pass = $conpass = $gender1 = $address = $designation1= "";

//if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (empty($_POST["fname"])) {
    $nameErr = "Name is Required";
  } else {
    $name = ($_POST["fname"]);
  }

  if (empty($_POST["lname"])) {
    $lnameErr = "Last Name is Required";
  } else {
    $lname = ($_POST["lname"]);
  }


  if (empty($_POST["email"])) {
    $emailErr = "Email is Required";
  } else {
    $email =($_POST["email"]);
  }

  if (empty($_POST["password"])) {
    $passErr = "Password is Required";
  } else {
    $pass =($_POST["password"]);
  }

  if (empty($_POST["conpassword"])) {
    $conpassErr = "Please enter confirmation password";
  } else {
    $conpass =($_POST["conpassword"]);
  }

  if (empty($_POST["address"])) {
    $addressErr = "Address is Required";
  } else {
    $address =($_POST["address"]);
  }

  if (empty($_POST["designation"])) {
    $designationErr = "Please Select Designation";
  } else {
    $designation1=($_POST["designation"]);
  }

  if(empty($_POST['gender']))
  {
    $genderErr ="Gender is Required";
  }
  else{
    $gender=($_POST["gender"]);
  }
?>