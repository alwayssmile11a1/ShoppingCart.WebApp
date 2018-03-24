<html>

<body>

    <?php

    session_start();

    if(!isset($_POST["productID"]))
    {
        unset($_SESSION['cart']);
        echo "Hello";
        return;
    }


    include "dbconnection.php";

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

        $count = count($_SESSION['cart']);
        for($i=0;$i<$count;$i++)
        {
        ?>
                    
            <tbody>
                <tr>
                    <th scope="row"><?php echo ($i+1); ?></th>
                    <td>
                        <img src="resources/<?php echo $_SESSION['cart'][$i]['image']; ?>" class="img-fluid" alt="Responsive image">
                    </td>
                    <td><?php echo $_SESSION['cart'][$i]['name']; ?></td>
                    <td><?php echo $_SESSION['cart'][$i]['price']; ?></td>
                    <td><?php echo $_SESSION['cart'][$i]['quantity']; ?></td>
                    <td class = "btn-group">
                    <a class = "btn btn-success btn-sm" id="">+</a>
                    <a class = "btn btn-warning btn-sm" id ="">-</a>
                    <a class = "btn btn-danger btn-sm" id ="">x</a>
                    </td>
                </tr>
            </tbody>

        
        <?php
        }
    }

?>

</body>


</html>