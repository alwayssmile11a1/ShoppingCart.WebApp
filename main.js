$(document).ready(function () {
    getCategories();
    getBrands();
    getProducts("random","random");

    $(document).delegate(".category", "click",function(){

        var categoryID = $(this).attr("categoryID");     
        getProducts(categoryID,"");

    });

    $(document).delegate(".brand", "click",function(){

        var brandID = $(this).attr("brandID");     
        getProducts("",brandID);

    });

    $("#search_button").click(function(){
        var search_content = $("#search_box").val();
        
        //not null
        if(search_content)
        {

        }

    })

    //-------------FUNCTIONS-------------------// 

    function getCategories()
    {
        $.ajax({  
            url: "categories.php",
            method:"POST",
            success: function(result)
            {
                $("#categories").html(result);
            }
            
        })
    }

    function getBrands()
    {
        $.ajax({  
            url: "brands.php",
            method:"POST",
            success: function(result)
            {
                $("#brands").html(result);
            }
            
        })
    }

    function getProducts(categoryID,brandID)
    {
        $.ajax({  
            url: "products.php",
            method:"POST",
            data:{categoryID:categoryID, brandID:brandID},
            success: function(result)
            {
                $("#products").html(result);
            }
            
        })
    }

})