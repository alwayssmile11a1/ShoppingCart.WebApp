<html>
<body>
    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
        <h5 class="nav-link active" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">Brand</h5>

        <?php 
            include "dbconnection.php";    
            {             
                $brand_query = "SELECT* FROM brands";
                $brands = mysqli_query($connect,$brand_query);

                if(mysqli_num_rows($brands)>0)
                {
                    while($brand = mysqli_fetch_array($brands))
                    {
        ?>

        <a class="nav-link" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">
            <?php echo $brand["brand_title"]; ?>
        </a>

        <?php

                    }
                }
            }
        ?>

    </div>
</body>

</html>