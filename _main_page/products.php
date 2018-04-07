<html>

<body>
    <div>
        <?php

        session_start();

        include "../_database_connection/dbconnection.php"; 

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
            $i = 0;
            while($product = mysqli_fetch_array($products))
            {
                if($i%3==0)
                {
                    ?>
                    <!-- <div class="row justify-content-start">                  -->
                    <?php
                }

                ?>
                    <!-- <div class="col-4"> -->
                        <div class="card mb-1 d-inline-block" style="width: 21rem" alt="Card image cap">
                            <img class="card-img-top maximagesize" src="resources/<?php echo $product['product_image']; ?>"></img>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo $product["product_title"]; ?> </p>
                                <a class="text-success">
                                    <?php echo $product["product_price"]; ?> đ</a>

                                <button class="btn btn-primary btn-sm addtocart" style="float:right" type="submit" productID="<?php echo $product['product_id']; ?>">AddToCard</button>                               
                            </div>
                        </div>
                    <!-- </div> -->
                <?php

                $i++;
                if($i%3==0)
                {
                    ?>
                    <!-- </div>                     -->
                    <?php
                }
            }
        }
           
        ?>
    </div>
</body>

</html>