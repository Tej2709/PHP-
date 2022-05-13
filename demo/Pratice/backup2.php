<?php

include("sql.php");
 
$query = "SELECT * FROM tableb";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

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
        
        $checkarr = $_POST['check'];

        foreach($checkarr as $id)
        {
            mysqli_query($conn,"Delete from tableb where id = ".$id );
        }
        header("location:tableA.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLE B PAGE</title>
</head>
<body>
    <h1>Table B</h1>
        <form method="POST">
            <table border="2">
                <tr>
                    <th></th>
                    <th>Checkboxes</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($data))
                    {
                        echo "<tr>";
                        echo "<td> <input checked type='checkbox' name='check[]' value='".$row['id']."'></td><td>".$row['checkbox_data']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                ?>
                </br>
                <input type="submit" name="submit"  value="TableA">
        </from>

</body>
</html>