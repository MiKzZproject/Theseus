<?php
require('../config/config.php');
$controlProduit = new \control\ControlProduit($bdd);
$controlCat = new \control\ControlCategorie($bdd);

$array = json_decode($_POST['donnees'], true);

$produits = $controlProduit->getProduitsOpt($array['value'],$array['type']);

if($produits){
?>

<table class="table table-striped">
        <tr>
            <td>libelle</td>
            <td>Image</td>
            <td>marque</td>
            <td>Catégorie</td>
            <td>description</td>
            <td>prix</td>
            <td>stock</td>
            <td></td>
            <td></td>
        </tr>
        <?php
        foreach($produits as $produit){
            $idCat = $controlCat->getCatProduit($produit->getId());
            $cat = $controlCat->getCategorie($idCat);

            ?>
            <tr>
                <td><?php echo $produit->getLibelle(); ?></td>
                <td><img src="../web/<?php echo $produit->getImage(); ?>" style="width:100%"></td>
                <td><?php echo $produit->getMarque(); ?></td>
                <td><?php echo $cat->getNom(); ?></td>
                <td><?php echo substr($produit->getDescription(),0,200); ?> ...</td>
                <td><?php echo $produit->getPrix(); ?></td>
                <td><?php echo $produit->getStock(); ?></td>
                <td ><span style="color:orange" class="glyphicon glyphicon-edit click" aria-hidden="true" data-toggle="modal" data-target="#updateProduitModal" onclick="produitUpdate('<?php echo $produit->getId() ?>')"></span></td>
                <td><span style="color:red" class="glyphicon glyphicon-remove click" aria-hidden="true" onclick="produitDelete('<?php echo $produit->getId() ?>')"></span></td>

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