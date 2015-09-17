/**
 * Created by mikzz on 17/09/15.
 */


function clientListe(value,type){
    var ab = {};
    ab.value = $('#client_recherche').val();
    ab.type = $('#client_recherche_type').val();

    var donnees = JSON.stringify(ab);
    $('#clientListe').load('client/liste.php', {donnees: donnees});
}

function clientDelete(id){
    var ab = {};
    ab.id = id;

    var donnees = JSON.stringify(ab);
    $('#clientResult').load('client/delete.php', {donnees: donnees});
}

function clientUpdate(id){
    var ab = {};
    ab.id = id

    var donnees = JSON.stringify(ab);
    $('#clientUpdate').load('client/clientUpdate.php', {donnees: donnees});
}


function clientUpdateValid(id){
    var ab = {};
    ab.id = id
    ab.nom = $('#nom').val();
    ab.prenom = $('#prenom').val();
    ab.dateNaissance = $('#dateNaissance').val();
    ab.tel = $('#tel').val();
    ab.newsletters = $('#newsletters').is(':checked');
    ab.alerte = $('#alerte').is(':checked');
    ab.email = $('#email').val();
    ab.dateDebutAbo = $('#dateDebutAbo').val();
    var split = ab.dateDebutAbo.split('T');
    ab.dateDebutAbo = split[0]+" "+ split[1];
    ab.dateFinAbo = $('#dateFinAbo').val();
    var split2 = ab.dateFinAbo.split('T');
    ab.dateFinAbo = split2[0]+" "+ split2[1];
    ab.ratio = $('#ratio').val();

    var donnees = JSON.stringify(ab);
    $('#clientResult').load('client/update.php', {donnees: donnees});
}