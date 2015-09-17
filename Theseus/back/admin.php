<?php
require('config/config.php');
$controlAdmin = new \control\ControlAdmin($bdd);
$admins = $controlAdmin->getAdmins();

if($_SESSION['admin']->getNiveau() == 1){
    ?>
    <h3>Gestion des Administrateurs</h3><br><br>
    <span id="adminResult"></span>
    <button class="btn btn-success" data-toggle="modal" data-target="#addAdminModal">Ajouter un admin</button><br><br>
    <span id="adminListe"></span>
    <?php
}else{
    ?>
    <p class="bg-warning"><br>Vous n'avez pas l'autorisation d'accéder à cette page.<br><br></p>
    <?php
}
?>


<!-- Modal ADD Admin -->
<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ajouter un Admin</h4>
            </div>
            <div class="modal-body">
                Login : <br>
                <input id="adminAdd_login" class="form-control" type="text"><br><br>
                Pass : <br>
                <input id="adminAdd_pass" class="form-control" type="password"><br><br>
                Email : <br>
                <input id="adminAdd_email" class="form-control" type="email"><br><br>
                Niveau : <br>
                <select id="adminAdd_niveau" class="form-control">
                    <option value="1">Powers</option>
                    <option value="2">Evenements</option>
                    <option value="3"¨>Produits</option>
                    <option value="4"¨>Clients</option>
                </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                <button type="button" onclick="adminAdd()" class="btn btn-primary">Ajouter l'admin</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal ADD Admin -->
<div class="modal fade" id="updateAdminModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ajouter un Admin</h4>
            </div>
            <div class="modal-body">
                <span id="adminUpdate"></span>
            </div>
        </div>
    </div>
</div>
<script>
    adminListe()
</script>
