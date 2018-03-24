$(document).ready(function () {
    getCategories();
    getBrands();
    getProducts("random", "random");
    $(document).delegate(".category", "click", function () {

        var categoryID = $(this).attr("categoryID");
        getProducts(categoryID, "category");

    });

    $(document).delegate(".brand", "click", function () {

        var brandID = $(this).attr("brandID");
        getProducts(brandID, "brand");

    });

    $(document).delegate(".addtocart", "click", function () {
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
        addProductToCart("");
    })



    //-------------FUNCTIONS-------------------// 

    function getCategories() {
        $.ajax({
            url: "categories.php",
            method: "POST",
            success: function (result) {
                $("#categories").html(result);
            }

        })
    }

    function getBrands() {
        $.ajax({
            url: "brands.php",
            method: "POST",
            success: function (result) {
                $("#brands").html(result);
            }

        })
    }

    function getProducts(sentData, detail) {
        $.ajax({
            url: "products.php",
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

    function addProductToCart(id) {
        $.ajax({
            url: "cart.php",
            method: "POST",
            data: {
                productID: id
            },
            success: function (result) {
                
                $("#in_cart_products").html(result);
            }

        })
    }

    function signUp() {
        $.ajax({
            url: "registration_validation.php",
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
            url: "sign_in_validation.php",
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