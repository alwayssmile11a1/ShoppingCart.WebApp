<html>

<body>
    <div class="list-group">
        <h5 href="#" class="mt-3 list-group-item list-group-item-action active" id ="brands_header">Brands</h5>

        <?php 
            include "../_database_connection/dbconnection.php"; 
            $brand_query = "SELECT* FROM brands";
            $brands = mysqli_query($connect,$brand_query);

            if(mysqli_num_rows($brands)>0)
            {
                while($brand = mysqli_fetch_array($brands))
                {
        ?>

                    <a class="list-group-item list-group-item-action brand" brandID="<?php echo $brand['brand_id'] ?>">
                        <?php echo $brand["brand_title"]; ?>
                    </a>

        <?php

                }
            }
            
        ?>

    </div>
</body>

</html>