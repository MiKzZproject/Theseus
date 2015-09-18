<?php
require('config/config.php');

if($_SESSION['admin']->getNiveau() == 2 || $_SESSION['admin']->getNiveau() == 1){
    ?>
    <h3>Gestion des Evènements</h3><br><br>

    <button class="btn btn-success" data-toggle="modal" data-target="#addEventModal">Ajouter un évènement</button><br><br>


    <div class="block_recherche">
        <input id="event_recherche" class="form-control" type="text" placeholder="Recherche">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        <select id="event_recherche_type" class="form-control">
            <option value="0">Libelle</option>
            <option value="1">Date de début</option>
        </select>
        <br><br>
    </div>

    <span id="eventResult"></span>
    <span id="eventListe"></span>

    <!-- Modal ADD Admin -->
    <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter un Evenement</h4>
                </div>
                <div class="modal-body">
                    Libelle : <br>
                    <input id="libelle" class="form-control" type="text"><br><br>
                    Lieu : <br>
                    <input id="lieu" class="form-control" type="text"><br><br>
                    Description : <br>
                    <input id="description" class="form-control" type="text"><br><br>
                    Adresse : <br>
                    <input id="adresse" class="form-control" type="text"><br><br>
                    code postale : <br>
                    <input id="cp" class="form-control" type="text"><br><br>
                    Ville : <br>
                    <input id="ville" class="form-control" type="text"><br><br>
                    dateDebut : <br>
                    <input id="dateDebut" class="form-control" type="datetime-local"><br><br>
                    dateFin : <br>
                    <input id="dateFin" class="form-control" type="datetime-local"><br><br>
                    place <disponible></disponible>: <br>
                    <input id="place" class="form-control" type="text"><br><br>
                    image : <br>
                    <input id="image" class="form-control" type="text"><br><br>
                    theme : <br>
                    <input id="theme" class="form-control" type="text"><br><br>
                    miniature1 : <br>
                    <input id="miniature1" class="form-control" type="text"><br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="button" onclick="eventAdd()" class="btn btn-primary" data-dismiss="modal">Ajouter un Evènement</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal ADD PRODUIT -->
    <div class="modal fade" id="modalUpdateEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modification de l'évènement</h4>
                </div>
                <div class="modal-body">
                    <span id="eventUpdate"></span>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal ADD PRODUIT -->
    <div class="modal fade" id="modalEventClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Les clients inscrits</h4>
                </div>
                <div class="modal-body">
                    <span id="eventClientResult"></span>
                    <span id="eventClient"></span>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal ADD PRODUIT -->
    <div class="modal fade" id="modalEventProduit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Les produits de la vente</h4>
                </div>
                <div class="modal-body">
                    <span id="eventProduitResult"></span>
                    <span id="eventProduit"></span>
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
    $('#event_recherche,#event_recherche_type').bind("change paste keyup", function() {
        eventListe();
    });
    eventListe()
</script>