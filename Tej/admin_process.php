<?php
include 'config.php';
session_start(); 
if(isset($_POST) && count($_POST)>0){
    $useremail = $_POST['email'];  
    $userpass = $_POST['password'];  
    if($_SESSION['email']="testuser@kcsitglobal.com")
    {
        $query = "SELECT * FROM login where email = '$useremail' and password = '$userpass'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while($result = mysqli_fetch_assoc($result)) {
                $_SESSION['email']=$useremail;
                header('Location:index.php');
            }
        }

        else {
            $query = "SELECT * FROM newadmin where email = '$useremail' and password = '$userpass'";
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
            while($result = mysqli_fetch_assoc($result))
            {
            
                $_SESSION['email']=$useremail;
                header('Location:index_product.php');
                
                }
            }
            else{
                // header('location:admin.php');
               echo "INVALID LOGIN";
            }
           
        }   
    }
   
}
?>