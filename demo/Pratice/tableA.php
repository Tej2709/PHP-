<?php
$servername="localhost";
$username="root";
$password="";
$databasename="practical";
 
$conn = mysqli_connect($servername,$username,$password,$databasename);

if(!$conn)
{
    die("Connection Failed".mysqli_connect_error());

}
$query = mysqli_query($conn,"select * from tablea");
?>
<?php
session_start();
?>
<html>
<head>
<body>
    <?php
    if(isset($_SESSION['status']))
    {
        echo "<h4>".$SESSION['status']."</h4>";
        unset($_SESSION['status']);
    }
    ?>
    <center>
        <h1>Table A</h1>
        <form method="POST" action="dataA.php">
            <table border="1">
                <tr>
                    <th></th>
                    <th>Checkboxes</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($query))
                    {
                        echo "<tr>";
                        echo "<td> <input type='checkbox' name='check[]' value='".$row['id']."'></td><td>".$row['checkboxes']." </td>" ;
                        echo "</tr>";
                    }
                    echo "</table>";
                ?>
                </br>
                <input type="submit" name="swap1" id="swap1" value="Swap to B">
        </from>
        <?php
            mysqli_close($conn);
        ?>
    </center>

</body>
</head>
</html>