$(document).ready(function () {
    getInCartProducts();

    //-------------FUNCTIONS-------------------// 
    function getInCartProducts()
    {
        $.ajax({
            url: "in_cart_products.php",
            method: "POST",
            success: function (result) {
                $("#incart_products").html(result);
            }

        })
    }

})