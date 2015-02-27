<?php
require('config/config.php');
$controlAdmin = new \control\ControlAdmin($bdd);
$admins = $controlAdmin->getAdmins();

if($_SESSION['admin']->getNiveau() == 1){
    ?>
    <h3>Gestion des Administrateurs</h3><br><br>
    <button class="btn btn-success" data-toggle="modal" data-target="#addProduitModal">Ajouter un admin</button><br><br>

    <table class="table table-striped">
        <tr>
            <td>login</td>
            <td>pass</td>
            <td>email</td>
            <td>niveau</td>
            <td></td>
            <td></td>
        </tr>
    <?php
    foreach($admins as $admin){
        ?>
        <tr>
            <td><?php echo $admin->getLogin() ?></td>
            <td><?php echo $admin->getPass() ?></td>
            <td><?php echo $admin->getEmail() ?></td>
            <td><?php echo $admin->getNiveau() ?></td>
            <td><span style="color:orange" class="glyphicon glyphicon-edit" aria-hidden="true"></span></td>
            <td><span style="color:red" class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
        </tr>
        <?php
    }
    ?>
    <?php
}else{
    ?>
    <p class="bg-warning"><br>Vous n'avez pas l'autorisation d'accéder à cette page.<br><br></p>
    <?php
}
?>


<!-- Modal ADD Admin -->
<div class="modal fade" id="addProduitModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ajouter un Admin</h4>
            </div>
            <div class="modal-body">
                Login : <br>
                <input class="form-control" type="text"><br><br>
                Pass : <br>
                <input class="form-control" type="password"><br><br>
                Email : <br>
                <input class="form-control" type="email"><br><br>
                Niveau : <br>
                <select class="form-control">
                    <option value="1">Powers</option>
                    <option value="2">Evenements</option>
                    <option value="3"¨>Produits</option>
                    <option value="4"¨>Clients</option>
                </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="addProduit" class="btn btn-primary">Ajouter l'admin</button>
            </div>
        </div>
    </div>
</div>