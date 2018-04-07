<html>

<body>
    <?php

    session_start();

    if(!isset($_POST['email'])) return;

    include "../_database_connection/dbconnection.php"; 

    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = md5(mysqli_real_escape_string($connect, $_POST['password']));

    echo $email;
    echo $password;

    //get user info
    $query = "SELECT* FROM user_info where email = '$email' AND password ='$password'";
    $userinfo = mysqli_query($connect,$query);

    //sign in successfully
    if(mysqli_num_rows($userinfo)>0)
    {
        ?>

        <!-- this value will be handled by main script  -->
        <div id="success">success</div>

        <?php

        $userinfo = mysqli_fetch_array($userinfo);
        
        $_SESSION["user_id"] = $userinfo["user_id"];
        $_SESSION["name"] = $userinfo["first_name"]." ".$userinfo["last_name"];


    }

    ?>

</body>


</html>