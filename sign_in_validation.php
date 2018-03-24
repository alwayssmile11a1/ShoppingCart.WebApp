<html>

<body>
    <?php

    if(!isset($_POST['email'])) return;

    include "dbconnection.php";

    echo "hello";

    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = md5(mysqli_real_escape_string($connect, $_POST['password']));

    //get user info
    $query = "SELECT* FROM user_info where email = '$email' AND password ='$password'";
    $userinfo = mysqli_query($connect,$query);

    if(mysqli_num_rows($userinfo)>0)
    {
        $userinfo = mysqli_fetch_array($userinfo);
   

        echo "name already exists";
        return;
    }
    else
    {
        ?>
        <script>
        // there is error in signing in
        $("#signin_error").html('<div class="font-weight-bold text-danger">Email or password is not correct</div>');
        </script>


        <?php
    }



    ?>

</body>


</html>