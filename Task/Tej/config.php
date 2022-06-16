<?php
 
 $server = "localhost";
 $username = "root";
 $password = "";
 $databasename = "admin";

 $conn= mysqli_connect($server,$username,$password,$databasename);
 if ($conn)
 {
     //echo "connection established";
 }
 else
 {
    echo "connection failed";
 }


?>