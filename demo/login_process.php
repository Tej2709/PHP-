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
  // echo "Invalid Login";
  header("location:index.php?pass=Invalid Login");
}
 }
?>






