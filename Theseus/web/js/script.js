if(location.pathname == '/index.php' || location.pathname == '/') {
    $("#menuHome").addClass("navbar-brand");
    $(".navbar-title").append("Home");
} else if (location.pathname == '/events.php') {
    $("#menuEvent").addClass("navbar-brand");
    $(".navbar-title").append("Les Évènements");
} else if (location.pathname == '/products.php') {
    $("#menuProduct").addClass("navbar-brand");
    $(".navbar-title").append("Les Produits");
} else if (location.pathname == '/productsPhares.php') {
    $("#menuProductPhare").addClass("navbar-brand");
    $(".navbar-title").append("Les produits phares");
} else if (location.pathname == '/account.php') {
    $("#menuAccount").addClass("navbar-brand");
    $(".navbar-title").append("Mon compte");
}

function searchCategorie(data) {
    $.ajax({
        method: "POST",
        url: "productsFiltered.php",
        data: {categorie : data}
    })
    .done(function( content ) {
            $('#product-content').html(content);
    });
}

$("#selectcatprod").change(function () {
    searchCategorie($( "#selectcatprod option:selected").val())
});


