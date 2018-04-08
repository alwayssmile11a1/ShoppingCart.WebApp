</<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../extensions/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/stylesheet.css" />
    <script src="../extensions/js/jquery.min.js"></script>
    <script src="../extensions/js/bootstrap.min.js"></script>
    <script src="payment_script.js"></script>
</head>

<body>
    <!-- taskbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
        <!-- shop name -->
        <a class="navbar-brand text-white font-weight-bold" href="../index.php">CLOVERSHOP</a>
    </nav>
    <p>
        <br/>
    </p>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6" id="form_content">
                <div class="card ">
                    <div class="card-body">
                        <div class="px-4 py-0 mb-3 font-weight-bold">Your Information</div>
                        <form class="px-4 py-0">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <small for="firstName">First name</small>
                                    <input type="text" class="form-control" style="display: block" name="firstName" id="firstName" placeholder="Please enter your first name">
                                </div>
                                <div class="form-group ml-5 col-md-6">
                                    <small for="address">Addess</small>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Please enter your address">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <small for="lastName">Last name</small>
                                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Please enter your last name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <small for="email">Email</small>
                                    <input type="text" class="form-control" style="display: block" name="email" id="email" placeholder="Please enter your email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <small for="phone">Mobile phone</small>
                                    <input type="text" class="form-control" style="display: block" name="phone" id="phone" placeholder="Please enter your mobile phone">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group mt-4 col-md-5">
                                    <button href="#" class="btn btn-primary" id="signup_button">SAVE INFORMATION</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="px-4 py-0 mb-3 font-weight-bold">Order Information</div>
                        <div class="px-4 py-0">
                            <div class="d-flex">
                                <div class="mr-auto p-2">
                                    <h6 class="font-weight-light">Products Price</h6>                                   
                                </div>
                                <div class="p-2">
                                    <h5 class="font-weight-bold text-warning" id = "products_price">10000 đ</h5>                                   
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class=" mr-auto p-2">
                                    <h6 class="font-weight-light">Transfer Costs</h6>                                   
                                </div>
                                <div class="p-2">
                                    <h5 class="font-weight-bold text-warning" id = "transfer_costs">10000 đ</h5>                                   
                                </div>
                            </div>

                            <div class="d-flex mt-4">
                                <div class="mr-auto p-2">
                                    <h6 class="font-weight-bold">Total</h6>                                   
                                </div>
                                <div class="p-2">
                                    <h4 class="font-weight-bold text-success" id = "total_price">10000 đ</h4>                                   
                                </div>
                            </div>

                            <div class=" mt-3">
                                <a class="btn btn-primary btn-block font-weight-bold" id="send_button" href="confirm_page.php">CONFIRM AND SEND</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6 mt-2" id="incart_products">
                
            </div>

        </div>

    </div>

</body>


</html>