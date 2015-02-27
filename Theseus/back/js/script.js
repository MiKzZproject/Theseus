function connection(){
    var login = $("#login_login").val();
    var pass = $("#login_pass").val();

    $('#login_result').load('connexion.php', {login: login, pass: pass})
}
function deconnexion(){
    $('login_result').load('deconnexion.php');
}

function gestionPage(page){
    $('#page').load(page+'.php');
}

$(document).ready(function() {
    var page = window.location.hash.substring(1);
    if(page ==""){
        window.location.hash ="#produit";
        gestionPage('produit');
    }else{
        gestionPage(page);
    }

});