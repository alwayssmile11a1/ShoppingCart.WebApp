$(document).ready(function () {
    getInCartProducts();

    $("#delete_all_button").click(function () {
        event.preventDefault();
        changeInCartProducts("all","");
    })
    $("body").on("click", ".delete_one_product_button", function () {
        event.preventDefault();
        var productID = $(this).attr("productID");
        changeInCartProducts("row",productID);
    })
    $("body").on("click", ".subtract_one_quantity_button", function () {
        event.preventDefault();
        var productID = $(this).attr("productID");
        changeInCartProducts("subtract",productID);
    })
    $("body").on("click", ".plus_one_quantity_button", function () {
        event.preventDefault();
        var productID = $(this).attr("productID");
        changeInCartProducts("plus",productID);
    })


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

    function changeInCartProducts(info, id) {
        $.ajax({
            url: "in_cart_products.php",
            method: "POST",
            data: {
                deleteCartAction: info,
                productID: id
            },
            success: function (result) {
                
                $("#incart_products").html(result);

                

            }

        })
    }

})