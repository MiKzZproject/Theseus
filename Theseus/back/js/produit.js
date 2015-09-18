/**
 * Created by mikzz on 17/09/15.
 */


function produitListe(value,type){
    var ab = {};
    ab.value = $('#produit_recherche').val();
    ab.type = $('#produit_recherche_type').val();

    var donnees = JSON.stringify(ab);
    $('#produitListe').load('produit/liste.php', {donnees: donnees});
}

function produitDelete(id){
    var ab = {};
    ab.id = id;

    var donnees = JSON.stringify(ab);
    $('#produitResult').load('produit/delete.php', {donnees: donnees});
}

function produitAdd(){
    var ab = {};
    ab.libelle = $('#libelle').val();
    ab.modele = $('#modele').val();
    ab.marque = $('#marque').val();
    ab.categorie = $('#categorie').val();
    ab.description = $('#desc').val();
    ab.prix = $('#prix').val();
    ab.stock = $('#stock').val();
    ab.image = $('#image').val();
    ab.miniature = $('#miniature').val();
    ab.nbVentes = $('#nbVentes').val();

    var donnees = JSON.stringify(ab);
    $('#produitResult').load('produit/add.php', {donnees: donnees});
}

function produitUpdate(id){
    var ab = {};
    ab.id = id

    var donnees = JSON.stringify(ab);
    $('#produitUpdate').load('produit/produitUpdate.php', {donnees: donnees});
}


function produitUpdateValid(id){
    var ab = {};
    ab.id = id
    ab.libelle = $('#libelle2').val();
    ab.marque = $('#marque2').val();
    ab.modele = $('#modele2').val();
    ab.categorie = $('#categorie2').val();
    ab.description = $('#desc2').val();
    ab.prix = $('#prix2').val();
    ab.stock = $('#stock2').val();
    ab.image = $('#image2').val();
    ab.miniature = $('#miniature2').val();
    ab.nbVentes = $('#nbVentes2').val();

    var donnees = JSON.stringify(ab);
    $('#produitResult').load('produit/update.php', {donnees: donnees});
}
