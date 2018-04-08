$(document).ready(function () {
    getCategories();
    getBrands();
    getProducts("random", "random");
    getInCartProducts();;
    $("body").on("click", ".category", function () {
        event.preventDefault();
        var categoryID = $(this).attr("categoryID");       
        $(this).addClass('list-group-item-secondary').siblings().removeClass('list-group-item-secondary');     
        $(".brand").each(function(){
            $(this).removeClass('list-group-item-secondary');
        });
        getProducts(categoryID, "category");

    });

    $("body").on("click", ".brand", function () {
        event.preventDefault();
        var brandID = $(this).attr("brandID");
        $(this).addClass('list-group-item-secondary').siblings().removeClass('list-group-item-secondary');
        $(".category").each(function(){
            $(this).removeClass('list-group-item-secondary');
        });
        getProducts(brandID, "brand");

    });

    $("body").on("click", ".addtocart", function () {
        event.preventDefault();
        var productID = $(this).attr("productID");
        addProductToCart(productID);

    });

    $("#search_button").click(function () {
        event.preventDefault();
        var search_content = $("#search_box").val();

        //not null
        if (search_content) {
            getProducts(search_content, "search");
        }

    })

    $("#home_button").click(function () {
        event.preventDefault();
        getProducts("random", "random");
    })

    $("#signup_button").click(function () {
        event.preventDefault();
        signUp();
    })

    $("#signin_button").click(function () {
        event.preventDefault();
        var email = $("#FormEmail").val();
        var password = $("#FormPassword").val();
        signIn(email, password);
    })

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

    $("body").on("click", ".page_number_button", function () {
        event.preventDefault();
        var pageNumber = $(this).attr("pageNumber");
        changePage("change",pageNumber);
    })

    //-------------FUNCTIONS-------------------// 

    function getCategories() {
        $.ajax({
            url: "_main_page/categories.php",
            method: "POST",
            success: function (result) {
                $("#categories").html(result);
            }

        })
    }

    function getBrands() {
        $.ajax({
            url: "_main_page/brands.php",
            method: "POST",
            success: function (result) {
                $("#brands").html(result);
            }

        })
    }

    function getProducts(sentData, detail) {
        $.ajax({
            url: "_main_page/products.php",
            method: "POST",
            data: {
                sentData: sentData,
                detail: detail
            },
            success: function (result) {
                $("#products").html(result);
            }

        })
    }

    function getInCartProducts()
    {
        $.ajax({
            url: "_main_page/cart.php",
            method: "POST",
            success: function (result) {
                $("#in_cart_products").html(result);
            }

        })
    }

    function addProductToCart(id) {
        $.ajax({
            url: "_main_page/cart.php",
            method: "POST",
            data: {
                productID: id
            },
            success: function (result) {
                
                $("#in_cart_products").html(result);
            }

        })
    }

    function changeInCartProducts(info, id) {
        $.ajax({
            url: "_main_page/cart.php",
            method: "POST",
            data: {
                deleteCartAction: info,
                productID: id
            },
            success: function (result) {
                
                $("#in_cart_products").html(result);
            }

        })
    }

    function changePage(info, id) {
        $.ajax({
            url: "_main_page/products.php",
            method: "POST",
            data: {
                changePage: info,
                pageNumber: id
            },
            success: function (result) {
                
                $("#products").html(result);
            }

        })
    }


    function signUp() {
        $.ajax({
            url: "_registration_form/registration_validation.php",
            method: "POST",
            data: $("form").serialize(),
            success: function (result) {
                //their is no error
                if ($(result).filter("#success").html() == "success") {
                    // there is no error in registering, display successful message. 
                    $("#form_content").html('<div class="text-center font-weight-bold text-success">You have successfully registered and logged in</div>');
                } else {
                    $("#signup_error").html(result);
                }

            }

        })
    }

    function signIn(email, password) {
        $.ajax({
            url: "_main_page/sign_in_validation.php",
            method: "POST",
            data: {
                email: email,
                password: password
            },
            success: function (result) {
                //their is no error
                if ($(result).filter("#success").html() == "success") {
                    window.location.href = "profile.php";
                } else {
                    // there is error in signing in
                    $("#signin_error").html('Email or password is not correct');
                }

            }

        })
    }





})