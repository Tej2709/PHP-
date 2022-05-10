<?php
 include ('Sql.php');
 session_start();
  if($_SESSION ['email'])
{

  header('location:index.php');
}
 if(isset($_POST) && count($_POST)>0)
 { 
   $useremail = $_POST['email'];
   $userpass = $_POST['password'];

   $query = "SELECT * FROM student WHERE email = '$useremail' AND password='$userpass'";
   $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)>0)
    {
   while($row = mysqli_fetch_assoc($result))
      $_SESSION['email']=$useremail;
      header("location:index.php");
    }
 
  else 
{
  echo "Invalid Login";
}
 }
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
    <form action="#" method="POST">
        <div class="container">
            <div class="title">
                Login Form
            </div>
            <div class="form">
                <div class="input_field">
                    <label> Email </label>
                    <input type="email" class="input" placeholder="Enter Your Email Here." name="email">
                </div>
                <!--PASSWORD-->
                <div class="input_field">
                    <label> Password </label>
                    <input type="password" class="input" placeholder="Enter Your Password" name="password">
                </div>
                <div class="input_field">
                    <input type="submit" value="Login" class="btn" name="button">
                </div>
                <div class="input_field">
                <input type="button" value="Registration" class="btn" name="button" onclick="window.location.href='Registration.php'">
                    
                </div>


            </div>
        </div>
    </form>
</body>

</html>