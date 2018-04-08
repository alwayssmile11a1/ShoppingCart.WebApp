<html>

<body>
    <div style="min-height: 40rem">
        <?php

        session_start();

        include "../_database_connection/dbconnection.php"; 

        if(!isset($_POST["sentData"])) return;

        $data = $_POST["sentData"];
        $detail =  $_POST["detail"];
        $numberOfProductsInOnePage = 4;

        $product_query;
        $productCount = 0;
        $offset = 0;
        if(isset($_POST["changePage"]))
        {
            $offset = ($_POST["pageNumber"] -1) * $numberOfProductsInOnePage;
        }

        //return 0 if two strings are equal
        if(strcmp($detail,"random")==0)
        {
            $product_query = "SELECT* FROM products ORDER BY RAND() LIMIT $numberOfProductsInOnePage";           

        }
        else
        {
            if(strcmp($detail,"category")==0)
            {
                $product_query = "SELECT* FROM products WHERE product_cat='$data' LIMIT $numberOfProductsInOnePage OFFSET $offset";
                $product_query2 = "SELECT COUNT(product_id) FROM products WHERE product_cat='$data'";
                $productCount = mysqli_query($connect,$product_query2);
                $productCount = mysqli_fetch_array($productCount)[0];     

            }
            else
            {
                if(strcmp($detail,"brand")==0)
                {
                    $product_query = "SELECT* FROM products WHERE product_brand='$data' LIMIT $numberOfProductsInOnePage OFFSET $offset";
                    $product_query2 = "SELECT COUNT(product_id) FROM products WHERE product_brand='$data'";
                    $productCount = mysqli_query($connect,$product_query2);
                    $productCount = mysqli_fetch_array($productCount)[0];  
                }
                else
                {
                    $product_query = "SELECT* FROM products WHERE product_keywords LIKE'%$data%' LIMIT $numberOfProductsInOnePage OFFSET $offset";
                    $product_query2 = "SELECT COUNT(product_id) FROM products WHERE product_keywords LIKE'%$data%'";
                    $productCount = mysqli_query($connect,$product_query2);
                    $productCount = mysqli_fetch_array($productCount)[0];  
                }
            }
        }
        
        $products = mysqli_query($connect,$product_query);

        if(mysqli_num_rows($products)>0)
        {
            $i = 0;
            while($product = mysqli_fetch_array($products))
            {
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

            }
        }          
        ?>
    </div>

    <nav class="mt-2" aria-label="page number">
        <ul class="pagination justify-content-center">

            <?php 
            $numberOfPage = (intval($productCount)%intval($numberOfProductsInOnePage)==0)?(intval(($productCount/$numberOfProductsInOnePage)))
                                                                            :((intval(($productCount/$numberOfProductsInOnePage))) + 1);

            for ($i=0; $i < $numberOfPage; $i++) 
            {
                if($i==0)
                {
                    ?>

                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                    
                    <?php
                }
                
                if((!isset($_POST["pageNumber"]) &&$i==0) || (isset($_POST["pageNumber"]) && $i == $_POST["pageNumber"]-1))
                {
                    ?>
                    <li class="page-item active" >
                        <a class="page-link page_number_button" href="#" pageNumber = "<?php echo $i; ?>"> <?php echo ($i+1); ?> <span class="sr-only">(current)</span> </a>
                    </li>
                    <?php
                }
                else
                {
                    ?>
                    <li class="page-item">
                        <a class="page-link page_number_button" href="#" pageNumber = "<?php echo $i; ?>"> <?php echo ($i+1); ?> </a>
                    </li>
                    <?php
                }              
                if($i==$numberOfPage-1)
                {
                    ?>
                    <li class="page-item">
                        <span class="page-link">Next</span>
                    </li>
                    <?php
                }                        
            }  
            ?>         
        </ul>
    </nav>

</body>

</html>