(function() {

    function searchCategorie(data) {
        $.ajax({
            method: "POST",
            url: "productsFiltered.php",
            data: {categorie : data}
        })
            .done(function successFilter( content ) {
                $('#product-content').html(content);
            });
    }

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

    $("#dropdownMenu").on('click', function dropdownHeader(e) {
        e.stopPropagation();
        $(this).find('[data-toggle=dropdown]').dropdown('toggle');
    });

    $('.dropdown-menu').click(function (event) {
        event.stopPropagation();
    });

    $(".newsletter .btn-primary").click(function newsletterInscription() {
        $.ajax({
            method: "POST",
            url: "inscriptionNewsletter.php",
            data: {mail : $('#mailNewsletter').val()}
        })
        .done(function successNewsletter(data) {
            if(data.response === "new") {
                $('#newsletterSuccess').show();
            } else {
                $('#newsletterInfo').show();
            }
            $('#newsletterError').hide();
            $('#newsletterForm').hide();
        })
        .fail(function errorNewsletter() {
            $('#newsletterError').show();
        });
        return false;
    });

    $("#formRegister").click(function registerClient() {
        console.log("test");
        console.log($("#formRegister input"));
        return false;
        //$.ajax({
        //    method: "POST",
        //    url: "register.php",
        //    data: {mail : $('#mailNewsletter').val()}
        //})
        //    .done(function successNewsletter(data) {
        //        if(data.response === "new") {
        //            $('#newsletterSuccess').show();
        //        } else {
        //            $('#newsletterInfo').show();
        //        }
        //        $('#newsletterError').hide();
        //        $('#newsletterForm').hide();
        //    })
        //    .fail(function errorNewsletter() {
        //        $('#newsletterError').show();
        //    });
        return false;
    });

    $("#selectcatprod").change(function filterCategorie() {
        searchCategorie($( "#selectcatprod option:selected").val())
    });

})();

