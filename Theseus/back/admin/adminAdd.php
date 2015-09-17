<?php
require('../config/config.php');
$controlAdmin = new \control\ControlAdmin($bdd);

if(isset($_POST['donnees']) && !$_POST['donnees'] == null){
    $array = json_decode($_POST['donnees'], true);
    $admin = new \model\Admin($array);
    $controlAdmin->addAdmin($admin);
    ?>
    <p class="bg-success"><br>Admin ajouté avec succès.<br><br></p>
<?php
}else{
    ?>
    <p class="bg-danger"><br>Une erreur est survenue.<br><br></p>
<?php
}