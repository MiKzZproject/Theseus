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
    } else if (page === 'registerForm.php') {
        $(".navbar-title").text("Inscription");
    }

    $(document).on('click', function dropdownHeader(e) {
        e.stopPropagation();
        $('.dropConnexion').find('[data-toggle=dropdown]').dropdown('toggle');
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
    };

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

        return false;
    };

    function paginationEvent(page,nbPage) {
        $.ajax({
            method: "POST",
            url: "eventsContent.php",
            data: {page : page, nbPage : nbPage}
        })
        .done(function successFilter( content ) {
            $('#events-content').html(content);

        });
    };

    function login() {
        var form = ($("#connexion")).serialize();
        $.ajax({
            method: "POST",
            url: "login.php",
            data: form
        })
        .done(function successLogin(data) {
            UIkit.notify({
                message : 'Bienvenue '+data.login+' !',
                status  : 'success',
                timeout :  5000,
                pos     : 'top-center'
            });
            $('#loginErrorEmail').hide();
            $('#loginErrorPwd').hide();
            $('#loginErrorWrong').hide();
            $("#connexion")[0].reset();
            $('#notLogged').hide();
            $('#logged').show();
            $('#nameLogin').html(data.login);
            $('#welcomeLogged').html("Bienvenue "+data.login);
            $('#dropdownMenu').trigger( "click" );
        })
        .fail(function errorLogin(data) {
            if (data.responseJSON) {
                if (data.responseJSON.wrong) {
                    $('#loginErrorWrong').show();
                } else {
                    $('#loginErrorWrong').hide();
                }
                if (data.responseJSON.login) {
                    $('#loginErrorEmail').show();
                } else {
                    $('#loginErrorEmail').hide();
                }
                if (data.responseJSON.pass) {
                    $('#loginErrorPwd').show();
                } else {
                    $('#loginErrorPwd').hide();
                }
            }
        });
        return false;
    };

    function logout() {
        $.ajax({
            method: "POST",
            url: "logout.php",
        })
        .done(function successLogout() {
            $('#notLogged').show();
            $('#logged').hide();
            $('#nameLogin').html("Me connecter");
            $('#dropdownMenu').trigger( "click" );
            window.location.href = 'index.php'
        });
        return false;
    };

    function updateMyInfos() {
        var form = ($("#myInfos")).serialize();
        $('#accountSuccessInfos').hide();
        $.ajax({
            method: "POST",
            url: "updateInfos.php",
            data: form
        })
        .done(function successUpdateMyInfos() {
            $('#accountErrorNom').hide();
            $('#accountErrorPrenom').hide();
            $('#accountErrorTel').hide();
            $('#accountErrorEmail').hide();
            $('#accountErrorEmail2').hide();
            $('#accountErrorDate').hide();
            $('#accountSuccessInfos').show();
        })
        .fail(function errorUpdateMyInfos(data) {
            if (data.responseJSON.nom) {
                $('#accountErrorNom').show();
            } else {
                $('#accountErrorNom').hide();
            }
            if (data.responseJSON.prenom) {
                $('#accountErrorPrenom').show();
            } else {
                $('#accountErrorPrenom').hide();
            }
            if (data.responseJSON.tel) {
                $('#accountErrorTel').show();
            } else {
                $('#accountErrorTel').hide();
            }
            if (data.responseJSON.email) {
                $('#accountErrorEmail').show();
            } else {
                $('#accountErrorEmail').hide();
            }
            if (data.responseJSON.date) {
                $('#accountErrorDate').show();
            } else {
                $('#accountErrorDate').hide();
            }
            if (data.responseJSON.loginTaken) {
                $('#accountErrorEmail2').show();
            } else {
                $('#accountErrorEmail2').hide();
            }
        });
        return false;
    };

    function updateMyAlerts() {
        var form = ($("#myAlerts")).serialize();
        $.ajax({
            method: "POST",
            url: "updateAlerts.php",
            data: form
        })
        .done(function successUpdateMyAlerts() {
            $('#accountSuccessAlerts').show();
        });
        return false;
    };

    function updateMyPwd() {
        var form = ($("#updatePassword")).serialize();
        $.ajax({
            method: "POST",
            url: "updatePwd.php",
            data: form
        })
        .done(function successUpdateMyPwd() {
            $('#accountErrorPwdActuel').hide();
            $('#accountErrorPwd').hide();
            $('#accountErrorPwd2').hide();
            $('#accountSuccessPwd').show();
            $("#updatePassword")[0].reset();
        })
        .fail(function errorUpdateMyPwd(data) {
            if (data.responseJSON.pwdAcutel) {
                $('#accountErrorPwdActuel').show();
            } else {
                $('#accountErrorPwdActuel').hide();
            }
            if (data.responseJSON.pwd) {
                $('#accountErrorPwd').show();
            } else {
                $('#accountErrorPwd').hide();
            }
            if (data.responseJSON.pwd2) {
                $('#accountErrorPwd2').show();
            } else {
                $('#accountErrorPwd2').hide();
            }
        });
        return false;
    };

    $("#forgot").click(function forgotPassword() {
        var form = ($("#forgotPassword")).serialize();
        $.ajax({
            method: "POST",
            url: "forgotPassword.php",
            data: form
        })
            .done(function successUpdateMyPwd() {
                $('#forgotPwdError').hide();
                $('#forgotPwdSuccess').show();
                $("#forgotPassword")[0].reset();
            })
            .fail(function errorUpdateMyPwd(data) {
                if (data.responseJSON.login) {
                    $('#forgotPwdError').show();
                } else {
                    $('#forgotPwdError').hide();
                }
            });
        return false;
    });

    $("#selectcatprod").change(function filterCategorie() {
        searchCategorie();
    });

    $(".previousProduct").click(function productPrev() {
        var page = $( "#currentPage").attr("data-page");
        if(page === "1") {
            return false;
        } else {
            pagination(--page);
            return false;
        }
    });

    $(".nextProduct").click(function productNext() {
        var currPage = $("#currentPage");
        var page = currPage.attr("data-page");
        var nbPage = currPage.attr("data-nbpage");
        if (page == nbPage) {
            return false;
        } else {
            pagination(++page);
            return false;
        }
    });

    $(".previousEvent").click(function eventPrev() {
        var currPage = $("#currentPage");
        var page = currPage.attr("data-page");
        var nbPage = currPage.attr("data-nbpage");
        if(page === "1") {
            return false;
        } else {
            currPage.attr("data-page",--page);
            $(".next.nextEvent").removeClass("disabled");
            if(page === "1") {
                $(".previous.previousEvent").addClass("disabled");
            }
            currPage.find( "a" ).html(page);
            paginationEvent(page,nbPage);
            return false;
        }
    });

    $(".nextEvent").click(function eventNext() {
        var currPage = $("#currentPage");
        var page = currPage.attr("data-page");
        var nbPage = currPage.attr("data-nbpage");
        if (page == nbPage) {
            return false;
        } else {
            currPage.attr("data-page",++page);
            $(".previous.previousEvent").removeClass("disabled");
            if (page == nbPage) {
                $(".next.nextEvent").addClass("disabled");
            }
            currPage.find( "a" ).html(page);
            paginationEvent(page,nbPage);
            return false;
        }
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
                $('#closeButton').show();
                $('#newsletterError').hide();
                $('#newsletterForm').hide();
            })
            .fail(function errorNewsletter(data) {
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
            $('#registerErrorEmail2').hide();
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
            if (data.responseJSON.loginTaken) {
                $('#registerErrorEmail2').show();
            } else {
                $('#registerErrorEmail2').hide();
            }
        });
        return false;
    });

    $("#login").click(function onLogin() {
        login();
        return false;
    });

    $("#logout").click(function onLogout() {
        logout();
        return false;
    });

    $("#formInfos").click(function updateInfos() {
        $('#accountSuccessInfos').hide();
        updateMyInfos();
        return false;
    });

    $("#formAlerts").click(function updateAlerts() {
        $('#accountSuccessAlerts').hide();
        updateMyAlerts();
        return false;
    });

    $("#formPwd").click(function updatePwd() {
        $('#accountSuccessPwd').hide();
        updateMyPwd();
        return false;
    });

    $(".forgotPasswordLink").click(function onForgotPwd() {
        $('#connexion').hide();
        $('#forgotPassword').show();
        return false;
    });

    $(".backToLogin").click(function onBackToLogin() {
        $('#connexion').show();
        $('#forgotPassword').hide();
        return false;
    });

    $(".subscribeEvent").click(function onSubscribeEvent(e) {
        var id = e.target.getAttribute("data-id");
        $.ajax({
            method: "POST",
            url: "inscriptionEvent.php",
            data: {idEvent : id}
        })
        .done(function successSubscribeEvent(data) {
            $('#myModal'+id).modal('hide');
            if(data.prenium) {
                UIkit.notify({
                    message: "Vous êtes inscrit pour cet évènement, vous recevrez votre invitation 48 heures avant le debut de l'évènement !",
                    status: 'success',
                    timeout: 5000,
                    pos: 'top-center'
                });
            }else {
                UIkit.notify({
                    message: "Vous venez de vous inscrire pour cet évènement, si vous êtes tirer au sort vous recevrez une invitation 48 heures avant le debut de l'évènement !",
                    status: 'success',
                    timeout: 5000,
                    pos: 'top-center'
                });
            }
        })
        .fail(function errorSubscribeEvent(data) {
            if (data.responseJSON.late) {
                UIkit.notify({
                    message: "Désolé mais il est trop tard pour s'inscrire a cet évènement !",
                    status: 'danger',
                    timeout: 5000,
                    pos: 'top-center'
                });
            }
            if (data.responseJSON.notLogged) {
                UIkit.notify({
                    message: "Vous devez être connecté pour vous inscrire a un évènement !",
                    status: 'danger',
                    timeout: 5000,
                    pos: 'top-center'
                });
            }
        });
        return false;
    });

})();

