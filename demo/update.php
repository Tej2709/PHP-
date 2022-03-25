<?php
error_reporting(0);
$id =$_GET['id'];
$query = "SELECT * FROM student where id='$id' ";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$result =mysqli_fetch_assoc($data);

?>



<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Form</title>
  <link rel="stylesheet" type="text/css" href="./style.css">

</head>
<body> 

<?php
 require ("sql.php");
 error_reporting(0);
  $query = "SELECT * FROM student where id = '".$_GET['id']."'";
  $data = mysqli_query($conn, $query);
  $total = mysqli_num_rows($data);
  echo "<br>";
  //echo $total;
if($total == 0)
{
    header('location:display.php');
}
else
{
        $raw = mysqli_fetch_assoc($data);

        //echo "<pre>";
        //print_r($_POST);
        //echo "</pre>";
        if(count($_POST)>0)
        {
            if($_GET['id']==$_POST['sid'])
            {
                //echo "thanks"; exit;
                $name = $_POST['fname'];
                $query = "UPDATE student SET fname = '$name', '$lname' ,'$email', '$password', '$conpassword', '$address','$designation','$gender' WHERE id=".$_GET['id'];
                $update = mysqli_query($conn,$query);
                if($update)
                {
                    echo "Data updated;";
                    header('location:display.php');
                }
                else
                {
                    echo "Data Failed";
                }
            }
            else
            {
                header('location:display.php');
            }
        }
        // echo "<pre>"; 
        // print_r($raw);
        // echo "</pre>";
?>
  <form method="POST">
      <input type="hidden" name="sid" value="<?=$raw['id']?>"> 
  <div class="container">
    <div class="title">
      Update Form 
    </div>
    <div class="form">
      <!--FIRST NAME-->  
          <div class="input_field">
            <label> First Name </label>
            <input type="text" class="input" placeholder="Enter Your First Name" name="fname" value="<?=$raw['fname']?>">
          </div>


      <!--LAST NAME-->
        <div class="input_field">
          <label> Last Name </label>
          <input type="text" class="input" placeholder="Enter Your Last Name" name="lname" value="<?=$raw['lname']?>">
        </div>
      <!--EMAIL-->

        <div class="input_field">
          <label> Email </label>
          <input type="email" class="input" placeholder="Enter Your Email Here." name="email" value="<?=$raw['email']?>">
        </div>
      <!--PASSWORD-->

        <div class="input_field">
          <label> Password </label>
          <input type="password" class="input" placeholder="Create Your Password" name="password" value="<?=$raw['password']?>">
        </div>

      <!--CONFIRM PASSWORD-->
        <div class="input_field">
          <label> Confirm Password </label>
          <input type="password" class="input" placeholder="Enter Your Confirm Password" name="conpassword" value="<?=$raw['conpassword']?>">
        </div>

        
          <label>Gender</label>
          <input type="radio" class="input" value="male <?=$raw['gender']?>">Male
          <input type="radio" class="input" value="female"<?=$raw['gender']?>>Female
        

      <!--ADDRESS-->
        <div class="input_field">
          <label> Address</label>
          <textarea rows="3" cols="30" placeholder="Enter Your Address" class="input" name="address">

          <?php echo $raw['address'];?>

          </textarea>
        </div>

      
      
      <!--Choose Designation-->
     <div class="input_field">
      Designation:  
          <select name="designation" class="designation" name="designation" value="<?=$raw['designation']?>">
            <option value="">Select Your Designation</option>
            <option value="Project Manager">Project Manager </option>
            <option value="Jr Developer">Jr Developer</option>
            <option value="Sr Developer">Sr Developer</option>
            <option value="Human Resources">Human Resources</option>
          </select>
     </div>
          <br> <br>

          <div class="input_field">
          <input type="submit" class="btn" value="Update Details" name="submit" >
          </div>
            
    </div>
  </div>
  </form>
  <?php } ?>
</body>
</html>