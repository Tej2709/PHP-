<script type="text/javascript">
  function validation() {
    var fname = document.getElementById('Fname').value;
    var lname = document.getElementById('Lname').value;
    var email = document.getElementById('Email').value;
    var password = document.getElementById('Password').value;
    var conpassword = document.getElementById('ConPassword').value;
    var address = document.getElementById('Address').value;
    var designation = document.getElementById('Designation').value;
    var gender = document.getElementById('gender').value;


    //FIRST NAME VALIDATION START HERE

    if (fname == "") {
      document.getElementById('name_error').innerHTML = "Please fill the first Name field ";
      return false;

    }

    if ((fname.length <= 1) || (fname.length >= 20)) {
      document.getElementById('name_error').innerHTML = "Firstname should be min 2 character and max 20";
      return false;
    }

    if (!isNaN(fname)) {
      document.getElementById('name_error').innerHTML = "Number not allowed";
      return false;
    }



    //LASTNAME VALIDATION


    if (lname == "") {
      document.getElementById('lastname').innerHTML = "Please fill last name field";
      return false;

    }

    if ((lname.length <= 1) || (lname.length >= 20)) {
      document.getElementById('lastname').innerHTML = "Lastname should be min 2 character and max 20";
      return false;
    }

    if (!isNaN(lname)) {
      document.getElementById('lastname').innerHTML = "Number not allowed";
      return false;
    }

    //EMAIL VALIDATION START HERE


    if (email == "") {
      document.getElementById('email_err').innerHTML = "Please fill the Email field ";
      return false;

    }

    if (email.indexOf('@') <= 0) {
      document.getElementById('email_err').innerHTML = "@ Invalid Position";
      return false;
    }

    if ((email.charAt(email.length - 4) != '.') && (email.charAt(email.length - 3) != '.')) {
      document.getElementById('email_err').innerHTML = "Invalid Email";
      return false;
    }

    //PASSWORD VALIDATION START HERE


    if (password == "") {
      document.getElementById('pass_err').innerHTML = "Please Enter the password ";
      return false;

    }

    if ((password.length <= 5) || (password.length >= 20)) {
      document.getElementById('pass_err').innerHTML = "Password must be min 5 character and max 20";
      return false;
    }

    if (password != conpassword) {
      document.getElementById('conpass_err').innerHTML = "Password does not match";
      return false;
    }


    if (conpassword == "") {
      document.getElementById('conpass_err').innerHTML = "Please enter the  Password ";
      return false;

    }

    if (address == "") {
      document.getElementById('add_err').innerHTML = "Please fill the address ";
      return false;

    }

    if (designation == "") {
      document.getElementById('designation_err').innerHTML = "Please select the designation";
      return false;
    }

    if (gender == "") {
      document.getElementById('').innerHTML = "Please Select the gender field";
    } else {
      return true;
    }
  }
</script>