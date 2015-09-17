function adminAdd(){
    var admin = {};
    admin.login = $('#adminAdd_login').val();
    admin.pass = $('#adminAdd_pass').val();
    admin.niveau = $('#adminAdd_niveau').val();
    admin.email = $('#adminAdd_email').val();

    var donnees = JSON.stringify(admin);
    $('#adminResult').load('admin/Add.php', {donnees: donnees});

}
function adminDelete(id){
    var ab = {};
    ab.id = id;

    var donnees = JSON.stringify(ab);
    $('#adminResult').load('admin/delete.php', {donnees: donnees});
}

function adminListe(){
    $('#adminListe').load('admin/liste.php');
}

function adminUpdate(id){
    var ab = {};
    ab.id = id

    var donnees = JSON.stringify(ab);
    $('#adminUpdate').load('admin/adminUpdate.php', {donnees: donnees});
}


function adminUpdateValid(id){
    var ab = {};
    ab.id = id
    ab.login = $('#login2').val();
    ab.pass = $('#pass2').val();
    ab.email = $('#email2').val();
    ab.niveau = $('#niveau2').val();

    var donnees = JSON.stringify(ab);
    $('#adminResult').load('admin/update.php', {donnees: donnees});
}