function adminAdd(){
    var admin = {};
    admin.login = $('#adminAdd_login').val();
    admin.pass = $('#adminAdd_pass').val();
    admin.niveau = $('#adminAdd_niveau').val();
    admin.email = $('#adminAdd_email').val();
    var donnees = JSON.stringify(admin);
    $('#adminResult').load('admin/adminAdd.php', {donnees: donnees});

}
function adminDelete(id){
    $('#adminResult').load('admin/adminDelete.php', {id: id});
}
