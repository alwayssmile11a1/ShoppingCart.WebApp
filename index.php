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
    <script src="main.js"></script>

</head>

<body>
    <!-- taskbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- shop name -->
        <a class="navbar-brand" href="#">Clover Shop</a>

        <!-- collapse button when the web view is small -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- collapsable area -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Product</a>
                </li>

                <!-- search bar -->
                <form class="form-inline ml-5 my-lg-0">
                    <input style="width:32rem" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search_box">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id = "search_button">Search</button>
                </form>

            </ul>
            <ul class="navbar-nav mr-1">

                <!-- cart button -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="cartDropDown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cart</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="cartDropDown">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </li>

                <!-- sign in button -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="signInDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
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
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">New around here? Sign up</a>
                        <a class="dropdown-item" href="#">Forgot password?</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">SignUp</a>
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
                <div class="card">
                    <div class="card-header">Products</div>
                    <div class="card-body">

                        <!--driven by main.js  -->
                        <div id="products"></div>

                    </div>
                    <div class="card-footer text-muted"></div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>