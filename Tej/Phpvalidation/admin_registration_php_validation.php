<?php 

$name_err = '';
$email_err = '';
$gender_err = '';
if(isset($_POST['submit']))
{
    if(empty($_POST['name']))
    {
        $name_err = "<p> Please enter your name </p>";
    }
    else
    {
        if(!preg_match("/^([a-zA-Z]{2,20})$/", $_POST['name']))
        {
            $name_err = "<p> Only Letters are allowed </p>";
        }
    }
}



?> 