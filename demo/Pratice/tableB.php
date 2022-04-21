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
$query = mysqli_query($conn,"select * from tableb");
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
        <h1>Table B</h1>
        <form method="POST" action="dataB.php">
            <table border="1">
                <tr>
                    <th></th>
                    <th>Checkboxes</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($query))
                    {
                        echo "<tr>";
                        echo "<td> <input checked type='checkbox' name='check[]' value='".$row['id']."'></td><td>".$row['checkboxes']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                ?>
                </br>
                <input type="submit" name="swap2" id="swap2" value="Swap to A">
        </from>
        <?php
            mysqli_close($conn);
        ?>
    </center>

</body>
</head>
</html>