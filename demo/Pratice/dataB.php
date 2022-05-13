<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$databasename="practical";
 
$conn = mysqli_connect($servername,$username,$password,$databasename);

if(!$conn)
{
    die("Connection Failed".mysqli_connect_error());

}

if (isset($_POST['swap2']))
{
    $data=$_POST['check'];
    if(!empty($_POST['check']))
        {
           $check_data=$_POST['check'];
           $check_data =implode("",$_POST['check']);     
        }

        foreach($data as $key=>$value)
        {
            $query="INSERT INTO tablea VALUES('','".$value."')";
            $data=mysqli_query($conn,$query);
        }

        if($data)
            {
                echo"Data Inserted Successfully";
                header('location:tableA.php');
                     
            }
        else
            {
                echo "Data Insertion Failed";
            }
    
}








    {
        $checkarr = $_POST['check'];

        foreach($checkarr as $id){
            mysqli_query($conn,"Delete from tableb where id = ".$id);
        }
        header("location:tableA.php");
    }
mysqli_close($conn);
?>