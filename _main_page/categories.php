<html>

<body>
    <div class="list-group">
        <h5 href="#" class="list-group-item list-group-item-action active" id ="categories_header"> Categories</h5>

        <?php 
            include "../_database_connection/dbconnection.php"; 
            $category_query = "SELECT* FROM categories";
            $categories = mysqli_query($connect,$category_query);

            if(mysqli_num_rows($categories)>0)
            {
                while($category = mysqli_fetch_array($categories))
                {
        ?>

                    <a class="list-group-item list-group-item-action category" categoryID="<?php echo $category['cat_id'] ?>">
                        <?php echo $category["cat_title"]; ?>
                    </a>

        <?php

                }
            }
            
        ?>

    </div>

</body>

</html>