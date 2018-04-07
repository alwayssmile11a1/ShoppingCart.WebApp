<?php 
session_start(); 

if(isset($_SESSION["user_id"]))
{
    header("location:profile.php");
}

?>

</<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clover Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="extensions/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/stylesheet.css" />
    <script src="extensions/js/jquery.min.js"></script>
    <script src="extensions/js/bootstrap.min.js"></script>
    <script src="mainscript.js"></script>
</head>

<body>
<div class ="bg-light">
    <!-- taskbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <!-- shop name -->
        <a class="navbar-brand text-white" href="#">CLOVERSHOP</a>

        <!-- collapse button when the web view is small -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- collapsable area -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="#" id="home_button">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Product</a>
                </li>

                <!-- search bar -->
                <form class="form-inline ml-5 my-lg-0">
                    <input style="width:32rem" class="form-control mr-sm-2 clearfix" type="search" placeholder="Search" aria-label="Search" id="search_box">
                    <button class="btn btn-light my-2 my-sm-0" id="search_button">Search</button>
                </form>

            </ul>
            <ul class="navbar-nav mr-1">
                <!-- sign in button -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="signInDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        SignIn
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="signInDropdown">
                        <form class="px-4 py-3">
                            <div class="form-group">
                                <label for="FormEmail">Email address</label>
                                <input type="email" class="form-control" id="FormEmail" placeholder="email@example.com">
                            </div>
                            <div class="form-group">
                                <label for="FormPassword">Password</label>
                                <input type="password" class="form-control" id="FormPassword" placeholder="Password">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                <label class="form-check-label" for="dropdownCheck"> Remember me </label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-1" id="signin_button" href="#">Sign in</button>
                            <div id="signin_error" class="font-weight-bold text-danger text-sm"> </div>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="registration_form.php">New around here? Sign up</a>
                        <a class="dropdown-item" href="#">Forgot password?</a>
                    </div>
                </li>
                <!-- sign up button -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="registration_form.php">SignUp</a>
                </li>
            </ul>

        </div>
    </nav>
    <p>
        <br/>
    </p>

    <!-- page content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <!--these area will be driven by main.js  -->
                <div id="categories"></div>
                <div id="brands"></div>
            </div>
            <div class="col-md-8">
                <ul class="nav nav-pills nav-fill bg-white clearfix">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Popular</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Newest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Best selling</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Price</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                
                </ul>
                <div class="mt-2">
                    <!--driven by main.js  -->
                    <div id="products"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>