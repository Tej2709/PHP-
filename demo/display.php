<?php

if(!isset($_SESSION))
{
  session_start();
}if(!($_SESSION ['email']))
{
  header('location: login.php');
}



?>

<html>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function deletere(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText==1)
        { 
            document.getElementById("txtHint").innerHTML = "Record deleted successfully";
            setInterval('window.location.reload()', 2000);
        }
        else
        {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }

      }
    };
    xmlhttp.open("GET", "delete.php?id=" + str, true);
    xmlhttp.send();
  }
  //window.confirm("Are you sure to delete this record");

}
</script>
<?php
 require ("sql.php");
 error_reporting(0);
  $query = "SELECT * FROM student ";
  $data = mysqli_query($conn, $query);
  $total = mysqli_num_rows($data);
  

  echo "<br>";
  //echo $total;

  if($total != 0)
{
      ?>
         <center>
         <h2>Display Records</h2>
         <p><span id="txtHint"></span></p>
         </center>
         <center>
        <table border="2" cellspacing="5" width ="100%">
            <tr>
            <th width="10%">Id</th>
            <th width="10%">Firstname</th>
            <th width="10%">Lastname</th>
            <th width="20%">Email</th>
            <th width="10%">Password</th>
            <th width="10%">Confirm Password</th>
            <th width="10%">Address</th>
            <th width="10%">Designation</th>
            <th width="10">Gender</th>
            <th width="10">File</th>
            <th width="10%" colspan="3">Actions</th>
            </tr>
</center>
    <?php
        //$result = mysqli_fetch_assoc($data);
        //echo "<pre>";
       // print_r($result);
       // echo "</pre>";
      while($result = mysqli_fetch_assoc($data))
      {
    ?>
        <tr>
        <td><?=$result['id']?></td>
        <td><?=$result['fname']?></td>
        <td><?=$result['lname']?></td>
        <td><?=$result['email']?></td>
        <td><?=$result['password']?></td>
        <td><?=$result['conpassword']?></td>
        <td><?=$result['address']?></td>
        <td><?=$result['designation']?></td>
        <td><?=$result['gender']?></td>
        <td><?=$result['file']?></td>
        <td><a href='update.php?id=<?=$result['id']?>'>Update </a></td>
        <td><a href="#" onclick="deletere(<?php echo $result['id'];?>)">Delete </a></td>
      </tr>
      <?php
      }
    }

    else
    {
      echo "No record found..";
    }
  


    ?>
    </table>

    <div class="input_field">
            
            <a href="Logoutt.php" class="btn">Logout</a>
          </div>
</html>