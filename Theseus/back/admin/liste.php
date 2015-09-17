<?php
require('../config/config.php');
$controlAdmin = new \control\ControlAdmin($bdd);

$admins = $controlAdmin->getAdmins();

if($admins){
?>

<table class="table table-striped">
        <tr>
            <td>Login</td>
            <td>Pass</td>
            <td>Email</td>
            <td>niveau</td>
            <td></td>
            <td></td>
        </tr>
<?php
    /** @var  $client  \model\Client */

    foreach($admins as $admin){
        ?>
        <tr>
            <td><?php echo $admin->getLogin() ?></td>
            <td><?php echo $admin->getPass() ?></td>
            <td><?php echo $admin->getEmail() ?></td>
            <td><?php echo $admin->getNiveau() ?></td>
            <td ><span style="color:orange" class="glyphicon glyphicon-edit click" aria-hidden="true" data-toggle="modal" data-target="#updateAdminModal" onclick="adminUpdate('<?php echo $admin->getId() ?>')"></span></td>
            <td><span style="color:red" class="glyphicon glyphicon-remove click" aria-hidden="true" onclick="adminDelete('<?php echo $admin->getId() ?>')"></span></td>

        </tr>
        <?php
    }
    ?>
</table>
    <?php
}else{
    ?>
        <div class="alert alert-warning" role="alert">Pas de résultat pour cette recherche.</div>
<?php
}