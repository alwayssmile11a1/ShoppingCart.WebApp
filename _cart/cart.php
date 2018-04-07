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
    <script src="cartscript.js"></script>
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
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div id="incart_products">
                   
                </div>
                <div class "container">
                    <!-- <div class="row justify-content-end">
                        <div>
                        <button class="btn btn-danger btn-sm mr-2" id="delete_all_button">Delete all</button>
                        </div>
                    </div> -->
                    <h2 class="row justify-content-end mt-5 font-weight-bold font-italic text-success" id="total_price">
                        
                    </h2>
                    <div class="row justify-content-center">
                        <?php
                            session_start();
                            if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
                            {
                                ?>
                                <a class="btn btn-lg btn-success" href="_cart/cart.php">Check out</a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a class="btn btn-lg btn-success disabled" href="#"aria-disabled="true">Check out</a>
                                <?php
                            }       
                        ?>
                    </div>
                    <h6 class="row mt-5 justify-content-end font-weight-light font-italic">All right reserved</h6>
                </div>
            </div>
           
        </div>
</body>


</html>