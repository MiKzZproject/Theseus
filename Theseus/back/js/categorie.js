/**
 * Created by mikzz on 17/09/15.
 */


function categorieListe(){
    $('#categorieListe').load('categorie/liste.php');
}

function categorieDelete(id){
    var ab = {};
    ab.id = id;

    var donnees = JSON.stringify(ab);
    $('#categorieResult').load('categorie/delete.php', {donnees: donnees});
}

function categorieAdd(){
    var ab = {};
    ab.nom = $('#nom').val();
    ab.description = $('#description').val();
    ab.image = $('#image').val();

    var donnees = JSON.stringify(ab);
    $('#categorieResult').load('categorie/add.php', {donnees: donnees});
}

function categorieUpdate(id){
    var ab = {};
    ab.id = id

    var donnees = JSON.stringify(ab);
    $('#categorieUpdate').load('categorie/categorieUpdate.php', {donnees: donnees});
}


function categorieUpdateValid(id){
    var ab = {};
    ab.id = id;
    ab.nom = $('#nom2').val();
    ab.description = $('#description2').val();
    ab.image = $('#image2').val();

    var donnees = JSON.stringify(ab);
    $('#categorieResult').load('categorie/update.php', {donnees: donnees});
}