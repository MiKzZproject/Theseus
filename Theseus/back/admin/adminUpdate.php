<?php
require('../config/config.php');
$controlAdmin = new \control\ControlAdmin($bdd);

$array = json_decode($_POST['donnees'], true);

$admin = $controlAdmin->getAdminId($array['id']);

?>

Login : <br>
<input id="login2" class="form-control" type="text" value="<?php echo $admin->getLogin(); ?>"><br><br>
Pass : <br>
<input id="pass2" class="form-control" type="text" value="<?php echo $admin->getPass(); ?>"><br><br>
Email : <br>
<input id="email2" class="form-control" type="text" value="<?php echo $admin->getEmail(); ?>"><br><br>
Niveau <br>
<select id="niveau2" class="form-control">
    <option value="1" <?php if($admin->getNiveau() == 1){echo "selected";} ?>>Powers</option>
    <option value="2" <?php if($admin->getNiveau() == 2){echo "selected";} ?>>Evenements</option>
    <option value="3" <?php if($admin->getNiveau() == 3){echo "selected";} ?>>Produits</option>
    <option value="4" <?php if($admin->getNiveau() == 4){echo "selected";} ?>>Clients</option>
</select>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" onclick="adminUpdateValid('<?php echo $admin->getId(); ?>')" class="btn btn-primary" data-dismiss="modal">Modifier l'admin</button>
</div>