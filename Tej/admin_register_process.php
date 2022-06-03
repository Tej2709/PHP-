<?php
include'config.php';
 session_start();
 if(!isset($_SESSION['email']))
 {
     Header('Location:admin.php');
 }

 if(isset($_POST['submit']) && COUNT($_POST)>0)
 {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $gender = $_POST['gender'];
     $hobbies=implode(',',(array)$_POST['checkbox']);
 
 
 if($name != "" && $email != "" && $password != "" && $gender != "" && $hobbies != "")
 {
     $query = "INSERT INTO `newadmin`( `name`, `email`, `password`, `gender`, `hobbies`) VALUES ('$name','$email','$password','$gender','$hobbies')";
     if(mysqli_query($conn,$query))
     {
         header("Location:index.php");
     }
     else
     {
         echo "Sorry something went wrong. Please try again";
     }

 }
 else 
 {
    echo "Please enter required values.";
 }
}

?>
