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
    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <script src="validation.js" type="text/javascript"> </script>   
    <script language="javascript" type="text/javascript">

  window.history.forward();

</script> 
</head>

<body>
    <form action="" method="POST">
        <div class="container">
            <div class="title">
                Login Form
            </div>
            <div class="form">
                <div class="input_field">
                    <label> Email </label>
                    <input type="text" class="input" placeholder="Enter Your Email Here." name="email" id="email" autocomplete="off" required>
                    <br>
                    
                
                </div>
                <span id="email_err" class="text-danger"></span>
                <!--PASSWORD-->
                <div class="input_field">
                    <label> Password </label>
                    <input type="password" class="input" placeholder="Enter Your Password" name="password" id="password" autocomplete="off" required>
                </div>
                <span id="pass_err" class="text-danger"></span>
                <div class="input_field">
                    <input type="submit" value="Login" class="btn" name="submit" id="submit">
                </div>
                <div class="input_field">
                <input type="button" value="Registration" class="btn" name="button" onclick="window.location.href='Registration.php'">
                    
                </div>


            </div>
        </div>
    </form>
</body>

</html>