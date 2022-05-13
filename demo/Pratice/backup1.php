<?php
include("sql.php");
if(isset($_POST['submit']))
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
            //$q1="DELETE FROM tablea where tablea = (".$value.")";

            $data=mysqli_query($conn,$query);
           // $data2=mysqli_query($conn,$q1);
            echo"data deleted table 1";
            
        }

        if($data)
            {
                echo"Data Inserted Successfully";
                header('location:tableb.php');
                     $data=$_POST['check'];
                        foreach($data as $key=>$value)
                        {
                            $q="INSERT INTO tableb VALUES('','".$value."')";
                            //$q1="DELETE FROM tablea where tablea = (".$value.")";
                            $data=mysqli_query($conn,$q);
                           // $data2=mysqli_query($conn,$data2);
                            //echo"Data Inserted Sucessfully";
                            $checkarr = $_POST['check'];

                        
                        }  
                        if($q)
                        {   
                            $q1="DELETE FROM tablea where tablea =(".$value.")";
                            $data=mysqli_query($conn,$q1);

                        }  
                
            }
        else
            {
                echo "Data Insertion Failed";
            }
            $checkarr = $_POST['check'];

            foreach($checkarr as $id)
            {
                mysqli_query($conn,"Delete from tablea where id = ".$id );
            }
            header("location:tableb.php");
          

}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLE A PAGE</title>
</head>
<body>
    <form method="POST">
            
        <input type="checkbox" name="check[]" value="Checkbox1">Checkbox1<br>
        <input type="checkbox" name="check[]" value="Checkbox2">Checkbox2<br>
        <input type="checkbox" name="check[]" value="Checkbox3">Checkbox3<br>
        <input type="checkbox" name="check[]" value="Checkbox4">Checkbox4<br>
        <input type="checkbox" name="check[]" value="Checkbox5">Checkbox5<br>
                
        <input type="submit" name="submit" value="Table B">
    </form>
     
</body>
</html>