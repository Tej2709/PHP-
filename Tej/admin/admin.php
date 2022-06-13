<?php
include 'admin_process.php';
include '../Phpvalidation/admin_php_validation.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <center>
    <h4>Login</h4>
</center>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
        integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
    <script src="../javascript/adminlogin.js"></script>
    <style>
    body {
        background-color: black;
        color: white;
    }
    </style>
</head>

<body>
    <div class="container">
    
        <form action="" method="POST">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Enter your Email" required> 
                        <span class="text-danger" id="email_err"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" id="password" name="password" placeholder="Enter your Password"
                            class="form-control"  require>
                        <span class="text-danger" id="pass_err"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Login </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>