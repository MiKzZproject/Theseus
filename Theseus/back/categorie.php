<?php
require('config/config.php');
$controlCategorie = new \control\ControlCategorie($bdd);
$categories = $controlCategorie->getCategories();

if($_SESSION['admin']->getNiveau() == 3 || $_SESSION['admin']->getNiveau() == 1){
    ?>
    <h3>Gestion des Catégories</h3><br><br>
    <button class="btn btn-success" data-toggle="modal" data-target="#modalAddCategorie">Ajouter une catégorie</button><br><br>
    <span id="categorieResult"></span>
    <span id="categorieListe"></span>
    <!-- Modal ADD PRODUIT -->
    <div class="modal fade" id="modalAddCategorie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter une catégorie</h4>
                </div>
                <div class="modal-body">
                    Nom : <br>
                    <input id="nom" class="form-control" type="text"><br><br>
                    Description : <br>
                    <input id="description" class="form-control" type="text"><br><br>
                    Image : <br>
                    <input id="image" class="form-control" type="text"><br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="button" onclick="categorieAdd()" class="btn btn-primary" data-dismiss="modal">Ajouter la catégorie</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal ADD PRODUIT -->
    <div class="modal fade" id="modalUpdateCategorie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification de la catégorie</h4>
                </div>
                <div class="modal-body">
                    <span id="categorieUpdate"></span>
                </div>

            </div>
        </div>
    </div>

<?php

}else{
    ?>
    <p class="bg-warning"><br>Vous n'avez pas l'autorisation d'accéder à cette page.<br><br></p>
<?php
}
?>
<script>
    categorieListe()
</script>