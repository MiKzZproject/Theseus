(function() {

    "use strict";

    var page = window.location.pathname.substring(21);

    if(page === 'index.php' || page === '') {
        $("#menuHome").addClass("navbar-brand");
        $(".navbar-title").text("Home");
    } else if (page === 'events.php') {
        $("#menuEvent").addClass("navbar-brand");
        $(".navbar-title").text("Les Évènements");
    } else if (page === 'products.php') {
        $("#menuProduct").addClass("navbar-brand");
        $(".navbar-title").text("Les Produits");
    } else if (page === 'featuredProducts.php') {
        $("#menuProductPhare").addClass("navbar-brand");
        $(".navbar-title").text("Les produits phares");
    } else if (page === 'myaccount.php') {
        $("#menuAccount").addClass("navbar-brand");
        $(".navbar-title").text("Mon compte");
        $("#footer").css("position", "absolute");
        $("#footer").css("bottom", 0);
    } else if (page === 'registerForm.php') {
        $(".navbar-title").text("Inscription");
    }

    $(document).on('click', function dropdownHeader(e) {
        e.stopPropagation();
        $('#dropConnexion').find('[data-toggle=dropdown]').dropdown('toggle');
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

    $(".registerForm .btn-success").click(function registerClient(e) {

        var form = ($("#formRegister")).serialize();
        $.ajax({
            method: "POST",
            url: "register.php",
            data: form
        })
        .done(function successNewsletter() {
            $('#registerErrorNom').hide();
            $('#registerErrorPrenom').hide();
            $('#registerErrorTel').hide();
            $('#registerErrorPwd').hide();
            $('#registerErrorPwd2').hide();
            $('#registerErrorEmail').hide();
            $('#registerErrorDate').hide();
            $('#registerSuccess').show();
            $("#formRegister")[0].reset();
        })
        .fail(function errorNewsletter(data) {
            if (data.responseJSON.nom) {
                $('#registerErrorNom').show();
            } else {
                $('#registerErrorNom').hide();
            }
            if (data.responseJSON.prenom) {
                $('#registerErrorPrenom').show();
            } else {
                $('#registerErrorPrenom').hide();
            }
            if (data.responseJSON.tel) {
                $('#registerErrorTel').show();
            } else {
                $('#registerErrorTel').hide();
            }
            if (data.responseJSON.pwd) {
                $('#registerErrorPwd').show();
            } else {
                $('#registerErrorPwd').hide();
            }
            if (data.responseJSON.pwd2) {
                $('#registerErrorPwd2').show();
            } else {
                $('#registerErrorPwd2').hide();
            }
            if (data.responseJSON.email) {
                $('#registerErrorEmail').show();
            } else {
                $('#registerErrorEmail').hide();
            }
            if (data.responseJSON.date) {
                $('#registerErrorDate').show();
            } else {
                $('#registerErrorDate').hide();
            }
        });
        return false;
    });

    function pagination(page) {
        var cat = $( "#selectcatprod option:selected").val();
        var nbPage = $( "#currentPage").attr("data-nbpage");

        $.ajax({
            method: "POST",
            url: "productsFiltered.php",
            data: {categorie : cat, page : page, nbPage : nbPage}
        })
        .done(function successFilter( content ) {
            $('#product-content').html(content);
        });
    }


    function searchCategorie() {
        var cat = $( "#selectcatprod option:selected").val();
        $.ajax({
            method: "POST",
            url: "productsFiltered.php",
            data: {categorie : cat, page : 1}
        })
            .done(function successFilter( content ) {
                $('#product-content').html(content);
            });
    }

    $("#selectcatprod").change(function filterCategorie() {
        searchCategorie();
    });

    $(".previous").click(function registerClient() {
        var page = $( "#currentPage").attr("data-page");
        if(page === "1") {
            return false;
        } else {
            pagination(--page);
            return false;
        }
    });

    $(".next").click(function registerClient() {
        var page = $( "#currentPage").attr("data-page");
        var nbPage = $( "#currentPage").attr("data-nbpage");
        if (page === nbPage) {
            return false;
        } else {
            pagination(++page);
            return false;
        }
    });
})();

