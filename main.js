$(document).ready(function () {
    function getCategory()
    {
        $.ajax({  
            url: "categories.php",
            method:"POST",
            data: {category:1},
            sucess: function(data)
            {

            }
            
        })
    }

    

})