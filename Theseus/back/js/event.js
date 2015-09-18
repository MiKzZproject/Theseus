/**
 * Created by mikzz on 17/09/15.
 */

function eventAdd(){
    var ab = {};
    ab.libelle = $('#libelle').val();
    ab.lieu = $('#lieu').val();
    ab.description = $('#description').val();
    ab.adresse = $('#adresse').val();
    ab.cp = $('#cp').val();
    ab.ville = $('#ville').val();
    ab.email = $('#email').val();
    ab.dateDebut = $('#dateDebut').val();
    var split = ab.dateDebut.split('T');
    ab.dateDebut = split[0]+" "+ split[1];
    ab.dateFin = $('#dateFin').val();
    var split2 = ab.dateFin.split('T');
    ab.dateFin = split2[0]+" "+ split2[1];
    ab.place = $('#place').val();
    ab.image = $('#image').val();
    ab.theme = $('#theme').val();
    ab.miniature1 = $('#miniature1').val();

    var donnees = JSON.stringify(ab);
    $('#eventResult').load('event/add.php', {donnees: donnees});
}
function eventListe(value,type){
    var ab = {};
    ab.value = $('#event_recherche').val();
    ab.type = $('#event_recherche_type').val();

    var donnees = JSON.stringify(ab);
    $('#eventListe').load('event/liste.php', {donnees: donnees});
}

function eventDelete(id){
    var ab = {};
    ab.id = id;

    var donnees = JSON.stringify(ab);
    $('#eventResult').load('event/delete.php', {donnees: donnees});
}

function eventUpdate(id){
    var ab = {};
    ab.id = id

    var donnees = JSON.stringify(ab);
    $('#eventUpdate').load('event/eventUpdate.php', {donnees: donnees});
}


function eventUpdateValid(id){
    var ab = {};
    ab.id = id
    ab.libelle = $('#libelle2').val();
    ab.lieu = $('#lieu2').val();
    ab.description = $('#description2').val();
    ab.adresse = $('#adresse2').val();
    ab.cp = $('#cp2').val();
    ab.ville = $('#ville2').val();
    ab.email = $('#email2').val();
    ab.dateDebut = $('#dateDebut2').val();
    var split = ab.dateDebut.split('T');
    ab.dateDebut = split[0]+" "+ split[1];
    ab.dateFin = $('#dateFin2').val();
    var split2 = ab.dateFin.split('T');
    ab.dateFin = split2[0]+" "+ split2[1];
    ab.place = $('#place2').val();
    ab.image = $('#image2').val();
    ab.theme = $('#theme2').val();
    ab.miniature1 = $('#miniature12').val();

    var donnees = JSON.stringify(ab);
    $('#eventResult').load('event/update.php', {donnees: donnees});
}

function eventClient(id){
    var ab = {};
    ab.id = id

    var donnees = JSON.stringify(ab);
    $('#eventClient').load('event/listeClient.php', {donnees: donnees});

}
function eventProduit(id){
    var ab = {};
    ab.id = id

    var donnees = JSON.stringify(ab);
    $('#eventProduit').load('event/listeProduit.php', {donnees: donnees});

}

function eventClientDelete(idEvent,idClient){
    var ab = {};
    ab.idEvent = idEvent;
    ab.idClient = idClient;

    var donnees = JSON.stringify(ab);
    $('#eventClientResult').load('event/clientDelete.php', {donnees: donnees});

}
function eventProduitDelete(idEvent,idProduit){
    var ab = {};
    ab.idEvent = idEvent;
    ab.idProduit = idProduit;

    var donnees = JSON.stringify(ab);
    $('#eventProduitResult').load('event/produitDelete.php', {donnees: donnees});

}