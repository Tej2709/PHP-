var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;
var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;
$(document).ready(function () {

    
    var emailflag = false, passwordflag = false;
    $("#email").blur(function () {
        $("#email_err").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("#email_err").html("(*) Email required..!!");
            emailflag = false;
        }
        else {
            if (!$(this).val().match($EmailIdRegEx)) {
                $("#email_err").html("(*) Invalid Email..!!");
                emailflag = false;
            }
            else {
                emailflag = true;
            }
        }
    });

    $("#password").blur(function () {
        $("#pass_err").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("#pass_err").html("(*) Password required..!!");
            passwordflag = false;
        }
        else {
            if (!$(this).val().match($PasswordRegEx)) {
                $("#pass_err").html("(*) Password should match Alphanumeric pattern..!!");
                passwordflag = false;
            }
            else {
                passwordflag = true;
            }
        }
    });
    $('#submit').click(function () 
    {   
        emailflag = false;
        $("#email_err").empty();
        if($("#email").val()==""){

            $("#email_err").html("Email Required");

        }else{

            if(!$("#email").val().match($EmailIdRegEx)){

                $("#email_err").html("Email Invalid");

            }else{

                emailflag=true;

            }

        }

        $("#pass_err").empty();
        if ($(this).val() == "" || $(this).val() == null) {
            $("#pass_err").html("(*) Password required..!!");
            passwordflag = false;
        }
        else {
            if (!$(this).val().match($PasswordRegEx)) {
                $("#pass_err").html("(*) Invalid Password..!!");
                passwordflag = false;
            }
            else {
                passwordflag = true;
            }
        }

        

    });
});

