<?php
require('../config/config.php');
$controlProduit = new \control\ControlProduit($bdd);

$array = json_decode($_POST['donnees'], true);

$produits = $controlProduit->getProduitByEvent($array['id']);
$allProduits = $controlProduit->getProduits();

if($produits){
?>

<table class="table table-striped">
        <tr>
            <td>Libelle</td>
            <td>Stock</td>
            <td></td>
        </tr>
    <?php
    foreach($produits as $produit){
        ?>
        <tr>
            <td><?php echo $produit->getLibelle() ?></td>
            <td><?php echo $produit->getStock() ?></td>
            <td><span style="color:red" class="glyphicon glyphicon-remove click" aria-hidden="true" onclick="eventProduitDelete('<?php echo $array['id']; ?>','<?php echo $produit->getId(); ?>')"></span></td>
        </tr>
        <?php
    }
    ?>
</table>
    <select id="addProduit" class="form-control">
        <?php foreach($allProduits as $produit){
            ?>
        <option value="<?php echo $produit->getId() ?>"><?php echo $produit->getLibelle() ?></option>
        <?php
    }
    ?>
    </select><br>
    <button class="btn" onclick="eventAddProduit('<?php echo $array['id'] ?>',$('#addProduit option:selected').val());">Associer le Produit</button>

<?php
}else{
    ?>
        <div class="alert alert-warning" role="alert">Pas de résultat pour cette recherche.</div>
<?php
}