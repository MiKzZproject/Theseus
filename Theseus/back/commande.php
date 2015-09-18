<?php
require('config/config.php');

$controlCommande = new \control\ControlCommande($bdd);
$commandes = $controlCommande->getCommandes();
$controlClient = new \control\ControlClient($bdd);
$controlEvent = new \control\ControlEvenement($bdd);
$controlProduit = new \control\ControlProduit($bdd);

if($_SESSION['admin']->getNiveau() == 2 || $_SESSION['admin']->getNiveau() == 1){
    ?>
    <h3>Gestion des commandes</h3><br><br>

    <span id="clientResult"></span>
    <span id="commandeListe">
        <table class="table">
            <tr>
                <td>Client</td>
                <td>Produit</td>
                <td>Evenement</td>
                <td>date Commande</td>
                <td>livrer</td>
                <td>Quantite</td>
            </tr>
        <?php foreach($commandes as $commande){
            $client = $controlClient->getClientById($commande->getIdClient());
                ?>
            <tr>
                <td><?php echo $client->getNom() ?></td>
                <td>Produit</td>
                <td>Evenement</td>
                <td>date Commande</td>
                <td>livrer</td>
                <td>Quantite</td>
            </tr>
            <?php
        }?>
        </table>
    </span>
    <!-- Modal ADD PRODUIT -->
    <div class="modal fade" id="modalUpdateCommande" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification de la Commande</h4>
                </div>
                <div class="modal-body">
                    <span id="clientUpdate"></span>
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
    $('#client_recherche,#client_recherche_type').bind("change paste keyup", function() {
        clientListe();
    });
    clientListe()
</script>