<html>

<body>
    <div>
        <?php
        include "dbconnection.php";      
        if(!isset($_POST["sentData"])) return;
        $data = $_POST["sentData"];
        $detail =  $_POST["detail"];

        $product_query;
        
        //return 0 if two strings are equal
        if(strcmp($detail,"random")==0)
        {
            $product_query = "SELECT* FROM products ORDER BY RAND() LIMIT 9";
        }
        else
        {
            if(strcmp($detail,"category")==0)
            {
                $product_query = "SELECT* FROM products WHERE product_cat='$data'";
            }
            else
            {
                if(strcmp($detail,"brand")==0)
                {
                    $product_query = "SELECT* FROM products WHERE product_brand='$data'";
                }
                else
                {
                    $product_query = "SELECT* FROM products WHERE product_keywords LIKE'%$data%'";
                }
            }
        }

        $products = mysqli_query($connect,$product_query);

        if(mysqli_num_rows($products)>0)
        {
            while($product = mysqli_fetch_array($products))
            {
        ?>

            <div class="card mb-3" style="width: 20rem;display:inline-block;" alt="Card image cap">
                <img class="card-img-top maximagesize" src="resources/<?php echo $product["product_image"]; ?>"></img>
                <div class="card-body">
                    <p class="card-text"> <?php echo $product["product_title"]; ?> </p>
                    <a class="text-success"><?php echo $product["product_price"]; ?> </a>
                    <button class="btn btn-primary btn-sm" style="float:right" type="submit"> AddToCard</button>
                </div>    
            </div>

            <?php

            }
        }
           
        ?>
    </div>
</body>

</html>