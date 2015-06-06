if(location.pathname == '/index.php' || location.pathname == '/') {
    $("#menuHome").addClass("navbar-brand");
} else if (location.pathname == '/events.php') {
    $("#menuEvent").addClass("navbar-brand");
} else if (location.pathname == '/products.php') {
    $("#menuProduct").addClass("navbar-brand");
} else if (location.pathname == '/productsPhares.php') {
    $("#menuProductPhare").addClass("navbar-brand");
} else if (location.pathname == '/account.php') {
    $("#menuAccount").addClass("navbar-brand");
}

function searchCategorie(data) {
    $.ajax({
        method: "POST",
        url: "template/product/productContent.php",
        data: {categorie : data}
    })
    .done(function( content ) {
            $('#product-content').html(content);
    });
}

$("#selectcatprod").change(function () {
    searchCategorie($( "#selectcatprod option:selected").val())
});

