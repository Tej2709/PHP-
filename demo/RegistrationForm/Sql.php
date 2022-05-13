<?php
     error_reporting(0);
     $servername = "localhost";
     $username = "root";
     $password = "";
     $databasename = "crud";

     $conn = mysqli_connect($servername,$username,$password,$databasename);

     if($conn)
     {
         //echo "Connection Establish";
     }
     else
     {
        echo "Connection Failed".mysqli_connect_error();
     }


?>