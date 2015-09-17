<?php
require('../config/config.php');
$controlProduit = new \control\ControlProduit($bdd);
$controlCat = new \control\ControlCategorie($bdd);

$array = json_decode($_POST['donnees'], true);

$categorie = $controlCat->getCategorie($array['id']);

?>

Nom : <br>
<input id="nom2" class="form-control" type="text" value="<?php echo $categorie->getNom() ?>"><br><br>
Description : <br>
<input id="description2" class="form-control" type="text" value="<?php echo $categorie->getDescription() ?>"><br><br>
Image : <br>
<input id="image2" class="form-control" type="text" value="<?php echo $categorie->getImage() ?>"><br><br>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" onclick="categorieUpdateValid('<?php echo $categorie->getId(); ?>')" class="btn btn-primary" data-dismiss="modal">Modifier la categorie</button>
</div>