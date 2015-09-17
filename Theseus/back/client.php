<?php
require('config/config.php');

if($_SESSION['admin']->getNiveau() == 2 || $_SESSION['admin']->getNiveau() == 1){
    ?>
    <h3>Gestion des Clients</h3><br><br>

    <div class="block_recherche">
        <input id="client_recherche" class="form-control" type="text" placeholder="Recherche">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        <select id="client_recherche_type" class="form-control">
            <option value="0">Nom</option>
            <option value="1">Email</option>
        </select>
        <br><br>
    </div>

    <span id="clientResult"></span>
    <span id="clientListe"></span>
    <!-- Modal ADD PRODUIT -->
    <div class="modal fade" id="modalUpdateClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification du Client</h4>
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