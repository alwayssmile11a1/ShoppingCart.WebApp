<html>
<body>
    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
        <h5 class="nav-link active" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Category</h5>

        <?php 
            include "dbconnection.php";    
            {             
                $category_query = "SELECT* FROM categories";
                $categories = mysqli_query($connect,$category_query);

                if(mysqli_num_rows($categories)>0)
                {
                    while($category = mysqli_fetch_array($categories))
                    {
        ?>

        <a class="nav-link" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">
            <?php echo $category["cat_title"]; ?>
        </a>

        <?php

                    }
                }
            }
        ?>

    </div>
</body>

</html>