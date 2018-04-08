<html>

<body>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        session_start();

        if(isset($_POST["deleteCartAction"]))
        {
            if(strcmp($_POST["deleteCartAction"],"all")==0) 
            {
                unset($_SESSION['cart']);
            }
            else
            {
        
                $productID = $_POST["productID"];
                //loop through all products in the shopping cart until it matches with delete id variable
                foreach($_SESSION['cart'] as $key => $product){
                    if ($product['id'] == $productID){

                        if(strcmp($_POST["deleteCartAction"],"row")==0) 
                        {
                            //remove product from the shopping cart when it matches with the delete id
                            unset($_SESSION['cart'][$key]);
                        }
                        else
                        {
                            //Plus 
                            if(strcmp($_POST["deleteCartAction"],"plus")==0) 
                            {
                                $_SESSION['cart'][$key]['quantity']+=1;
                                
                            }
                            else //Subtract
                            {
                                $_SESSION['cart'][$key]['quantity']-=1;
                                
                                if($_SESSION['cart'][$key]['quantity']==0)
                                {
                                    //remove product from the shopping cart when it matches with the delete id
                                    unset($_SESSION['cart'][$key]);
                                }
                            }

                        }
                        break;
                    }
                }
                //reset session array keys so they match with $product_ids numeric array
                $_SESSION['cart'] = array_values($_SESSION['cart']);

            } 
        }
        else
        {
            if(isset($_POST["productID"]))
            {
                include "../_database_connection/dbconnection.php"; 

                $productID = $_POST["productID"];

                $query = "SELECT* FROM products where product_id = '$productID'";
                $products = mysqli_query($connect,$query);


                if(mysqli_num_rows($products)>0)
                {

                    $product = mysqli_fetch_array($products);

                    if(isset($_SESSION['cart'])){
                        $product_ids = array();
                        //keep track of how mnay products are in the shopping cart
                        $count = count($_SESSION['cart']);
                        
                        //create sequantial array for matching array keys to products id's
                        $product_ids = array_column($_SESSION['cart'], 'id');
                        
                        if (!in_array($productID, $product_ids)){
                        $_SESSION['cart'][$count] = array
                            (
                                'id' => $productID,
                                'name' => $product['product_title'],
                                'image' => $product['product_image'],
                                'price' => $product['product_price'],
                                'quantity' => 1
                            );   
                        }
                        else { //product already exists, increase quantity
                            //match array key to id of the product being added to the cart
                            for ($i = 0; $i < count($product_ids); $i++){
                                if ($product_ids[$i] == $productID){
                                    //add item quantity to the existing product in the array
                                    $_SESSION['cart'][$i]['quantity'] += 1;
                                    break;
                                }
                            }
                        }
                        
                    }
                    else { //if cart session doesn't exist, create first product with array key 0
                        //create array, start from key 0 and fill it with values
                        $_SESSION['cart'][0] = array
                        (
                            'id' => $productID,
                            'name' => $product['product_title'],
                            'image' => $product['product_image'],
                            'price' => $product['product_price'],
                            'quantity' => 1
                        );
                    }
                }
            }
        }



        if(isset($_SESSION['cart']))
        {
            $count = count($_SESSION['cart']);
            for($i=0;$i<$count;$i++)
            {
            ?>

                <tbody>
                    <tr>
                        <th scope="row">
                            <?php echo ($i+1); ?>
                        </th>
                        <td>
                            <img src="../resources/<?php echo $_SESSION['cart'][$i]['image']; ?>" class="img-fluid" style="height:5rem" alt="Responsive image">
                        </td>
                        <td>
                            <?php echo $_SESSION['cart'][$i]['name']; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['cart'][$i]['price']; ?>
                        </td>
                        <td>
                            <?php echo $_SESSION['cart'][$i]['quantity']; ?>
                        </td>
                        
                    </tr>
                </tbody>


                <?php
            }
        }
        ?>
    </tbody>
</table>
    
</body>

</html>