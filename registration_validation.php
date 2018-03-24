<html>
<body>
    <?php

    include "dbconnection.php";

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    $password = md5($_POST["password"]);
    $repassword = md5($_POST["repassword"]);
    $mobile = $_POST["mobilephone"];

    //check valid 
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
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        echo "Email is not valid";
        return;
    }
    if(strcmp($password, $repassword)!=0)
    {
        echo "Password and re-enter password are not the same";
        return;
    }

    //check name existence
    $query = "SELECT* FROM user_info where (first_name = '$firstName' AND last_name ='$lastName')";
    $row = mysqli_query($connect,$query);

    if(mysqli_num_rows($row)>0)
    {
        echo "name already exists";
        return;
    }

    //check email existence
    $query = "SELECT* FROM user_info where email = '$email'";
    $row = mysqli_query($connect,$query);
    if(mysqli_num_rows($row)>0)
    {
        echo "email already exists";
        return;
    }

    //their is no error
    ?>
    <!-- this value will be handled by main script  -->
    <div id="success">success</div>

    <?php
    $query = "SELECT MAX(user_id) FROM user_info";
    $maxID = mysqli_query($connect,$query);

    if(mysqli_num_rows($maxID)>0)
    {
        $maxID = mysqli_fetch_array($maxID)[0] + 1;
    }

    //add user info to database
    $query = "INSERT INTO user_info(`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) 
                                        VALUES ('$maxID','$firstName','$lastName','$email','$password','$mobile','','')";

    $success = mysqli_query($connect,$query);
    

    ?>

</body>


</html>