<?php
 include ("psql.php");
 if(isset($_POST['submit'])){

  if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['password']))
  {
          $fname =$_POST['fname'];
          $lname =$_POST['lname'];
          $password =$_POST['password'];
          $tech =$_POST['check'];
          $tech=implode(",",$_POST['check']);

          $query ="INSERT INTO demo values ('','".$fname."','".$lname."','".$password."','".$tech."')";
          $data=mysqli_query($conn,$query);
        
          if($data)
          {
              echo"Data Inserted";

          }
          else{
              echo"Data Inserted failed";
          }
  }
  else
  {
      echo "All fields are required";
  }

  // $tech =$_POST['check'];
  // foreach($tech as $check)
  // {
  //   echo $check;
  // }

  $tech=$_POST['check'];

  $tech=implode(",", $_POST['check']);



}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pratice Form</title>
</head>
<body>
  <form  action= "" method="POST">
    <!--Fname--->
    Firstname
    <input type="text" name="fname" id="fname" placeholder="Enter your name ">
    <br><br>

    <!--Lname-->
    Lastname
    <input type="text" name="lname" id="lname" placeholder="Enter your lastname ">
    <br> <br>

    <!--Password-->
    Password
    <input type="password" name="password" id="password" placeholder="Enter your Password ">
    <br><br>

    <!--CHECKBOX-->

    <input type="checkbox" name="check[]"  value="PHP" >PHP <br> 
    
    <input type="checkbox" name="check[]"  value="JAVA">JAVA <br>
    
    <input type="checkbox" name="check[]"  value="REACT">REACT JS
    <br><br>

   
    <!--button-->

    <button type="submit" value="submit" name="submit"  >Submit </button>

    


  </form>  

</body>
</html>


