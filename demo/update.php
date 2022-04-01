<?php
error_reporting(0);
$id = $_GET['id'];
//echo $id; 
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
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit
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

        
        if(count($_POST)>0)
        {
            if($_GET['id']==$_POST['sid'])
            {
                //echo "thanks"; exit;
                $name = $_POST['fname'];
                $lname= $_POST['lname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $conpassword =$_POST['conpassword'];
                $address=$_POST['address'];
                $designation=$_POST['designation'];
                $gender =$_POST['gender'];
                

                $query = "UPDATE student SET fname = '$name', lname = '$lname' , email ='$email', password='$password', conpassword='$conpassword', address='$address', designation='$designation', gender='$gender' WHERE id=".$_GET['id'];
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
  <form method="POST" enctype="multipart/form-data"> 
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

        <!--GENDER-->
        
          <label>Gender</label>
          <input type="radio" class="input" value="1" name="gender"<?php if($raw['gender']=="1"){echo "checked";}?>>Male
          <input type="radio" class="input" value="0" name="gender"<?php if($raw['gender']=="0"){echo "checked";}?>>Female
          <br>
          <br>

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
          <select name="designation" class="designation" name="designation">
            <option value="">Select Your Designation</option>
            <option value="Project Manager" <?php if($raw['designation']=="Project Manager") { echo "selected=selected"; } else {echo "";} ?> >Project Manager </option>
            <option value="Jr Developer" <?php if($raw['designation']=="Jr Developer") { echo "selected=selected"; } else {echo "";} ?>>Jr Developer</option>
            <option value="Sr Developer" <?php if($raw['designation']=="Sr Developer") { echo "selected=selected"; } else {echo "";} ?> >Sr Developer</option>
            <option value="Human Resources" <?php if($raw['designation']=="Human Resources") { echo "selected=selected"; } else {echo "";} ?>>Human Resources</option>
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