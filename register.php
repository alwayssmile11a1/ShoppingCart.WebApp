<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="extensions/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/stylesheet.css" />
    <script src="extensions/js/jquery.min.js"></script>
    <script src="extensions/js/bootstrap.min.js"></script>
    <script src="mainscript.js"></script>
</head>

<body>
    <?php

    include "dbconnection.php";

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];

    $password = md5($_POST["password"]);
    $repassword = md5($_POST["repassword"]);
    $mobile = $_POST["mobilephone"];

    if(!isset($_POST["termcheckbox"]))
    {
        echo "You haven't accepted the service term";
        return;
    }

    if(empty($firstName) || empty($lastName)||empty($email) ||empty($password)||empty($repassword)||empty($mobile))
    {
        echo "Please fill in all the fields";
        return;
    }

    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        echo "Email is not valid";
        return;
    }

    if(strcmp($password, $repassword)!=0)
    {
        echo "Password and re-enter password are not the same";
        return;
    }

    ?>

</body>

<script>
    // there is no error in registering 
    $("#form_content").html('<div class="text-center font-weight-bold text-success">You have successfully registered and logged in</div>');
</script>


</html>