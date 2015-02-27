<?php
require('config/config.php');
$controlAdmin = new \control\ControlAdmin($bdd);

if(isset($_POST['id']) && !$_POST['id'] == null){
    $controlAdmin->deleteAdmin($_POST['id']);
    ?>
    <p class="bg-success"><br>Admin supprimer avec succès.<br><br></p>
<?php
}else{
    ?>
    <p class="bg-danger"><br>Une erreur est survenue.<br><br></p>
<?php
}