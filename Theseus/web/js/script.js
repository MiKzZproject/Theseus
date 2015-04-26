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
