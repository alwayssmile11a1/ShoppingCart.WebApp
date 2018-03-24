</<!DOCTYPE html>
<html>

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
    <!-- taskbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- shop name -->
        <a class="navbar-brand" href="#">CLOVERSHOP</a>
    </nav>
    <p>
        <br/>
    </p>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" id="form_content">
                <div class="container-fluid mb-3 text-center text-danger font-weight-bold" id="signup_error">

                </div>
                <div class="card ">
                    <div class="mt-3 text-center font-weight-bold">Sign up</div>
                    <div class="card-body">
                        <form class="px-4 py-0">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" style="display: block" name="firstName" placeholder="First name">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="lastName" placeholder="Last name">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="email@example.com">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="repassword" placeholder="Re-enter password">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="mobilephone" placeholder="Mobile phone">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck" name="termcheckbox">
                                <label class="form-check-label" for="dropdownCheck"> I agree to the Shop Terms of Use and Privacy Policy </label>
                            </div>
                            <div class="form-group mt-3">
                                <button href="#" class="btn btn-primary btn-block" id="signup_button">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

</body>


</html>