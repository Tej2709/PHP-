<?php 
    // session_start();
    // if(isset($_SESSION['email'])){
    //     header("location:login.php ");
    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
        integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="./bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="./style.css">
    <script src="./V.js" type="text/javascript"></script>

</head>

<body>
    <form action="process.php" method="POST" onsubmit="return validation()" enctype="multipart/form-data">
        <div class="container">
            <div class="title">
                Registration Form
            </div>
            <span style="color:red;text-align: center;">

                <?php

                        if (isset($_REQUEST['pass'])) {

                            # code...

                            $pass = $_REQUEST['pass'];

                        ?>

                <p> <?php echo $pass; ?></p>

                <?php

                        } else {

                            $pass = "";

                        }

                        ?>

            </span>

            <div class="form">
                <!--FIRST NAME-->
                <div class="form-group">
                    <div class="input_field">
                        <label> First Name </label>
                        <input type="text" class="input" placeholder="Enter Your First Name" name="fname" id="Fname"
                            autocomplete="off" required autofocus>
                    </div>
                    <span id="name_err" class="text-danger"></span>
                </div>


                <!--LAST NAME-->

                <div class="form-group">
                    <div class="input_field">
                        <label> Last Name </label>
                        <input type="text" class="input" placeholder="Enter Your Last Name" name="lname"
                            autocomplete="off" id="Lname" required autofocus>
                    </div>
                    <span id="lastname" class="text-danger"></span>
                </div>


                <!--EMAIL-->

                <div class="form-group">
                    <div class="input_field">
                        <label> Email </label>
                        <input type="email" class="input" placeholder="Enter Your Email Here." name="email" id="Email"
                            autocomplete="off" required autofocus>
                    </div>
                    <span id="email_err" class="text-danger"></span>
                </div>


                <!--PASSWORD-->

                <div class="form-group">
                    <div class="input_field">
                        <label> Password </label>
                        <input type="password" class="input" placeholder="Create Your Password" name="password"
                            id="Password" autofocus required>
                    </div>
                    <span id="pass_err" class="text-danger"></span>
                </div>

                <!--CONFIRM PASSWORD-->

                <div class="form-group">
                    <div class="input_field">
                        <label> Confirm Password </label>
                        <input type="password" class="input" placeholder="Enter Your Confirm Password"
                            name="conpassword" id="ConPassword" autofocus required>
                    </div>
                    <span id="conpass_err" class="text-danger"></span>
                </div>

                <!--ADDRESS-->

                <div class="form-group">
                    <div class="input_field">
                        <label> Address</label>
                        <textarea rows="1" cols="10" placeholder="Enter Your Address" class="input" name="address"
                            id="Address" required> </textarea>
                    </div>
                    <span id="add_err" class="text-danger "> </span>
                </div>




                <!--Choose Designation-->

                <div class="form-group">
                    <div class="input_field">
                        <label> Designation</label>
                        <select name="designation" class="designation" name="designation" id="designation" required>
                            <option value="">Select Your Designation</option>
                            <option value="Project Manager">Project Manager </option>
                            <option value="Jr Developer">Jr Developer</option>
                            <option value="Sr Developer">Sr Developer</option>
                            <option value="Human Resources">Human Resources</option>
                        </select>
                    </div>
                    <span id="designation_err" class="text-danger"></span>
                </div>
                <br>

                <!--Gender-->

                <div class="form-group">
                    <label>Gender</label>
                    <input type="radio" name="gender" value="male" class="input">Male
                    <input type="radio" name="gender" value="female" class="input">Female
                </div>
                <br> <br>

                <!--File Upload-->
                <div class="input_field">
                    <input type="file" id="fileToUpload" name="fileToUpload">
                </div>
                <span>Please Upload only .pdf .docs and .xl extension File</span>
                <br><br />

                <!--Submit Button-->
                <div class="input_field">
                    <input type="submit" class="btn" name="submit" id="submit">
                </div>

                <div class="input_field">

                    <a href="login.php" class="btn">Login</a>
                </div>
            </div>
        </div>
    </form>

</body>

</html>