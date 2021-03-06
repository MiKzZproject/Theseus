<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19/08/2015
 * Time: 14:46
 */

include('template/header.php');
?>
<section id="myAccount-content" class="container">
<h1 class="ML10">Espace Mon Compte</h1>

<?php if ($logged) {
    $controlClient = new \control\ControlClient(\config\Db::getInstance());
    $commandes = $controlClient->getCommandes($client->getId());
?>

    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#commandes" aria-controls="commandes" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-shopping-cart"></span> Mes Commandes</a></li>
            <li role="presentation"><a href="#informations" aria-controls="informations" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-user"></span> Mes Informations</a></li>
            <li role="presentation"><a href="#modifPassword" aria-controls="modifPassword" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-pencil"></span> Changer de mot de passe</a></li>
            <li role="presentation"><a href="#alertes" aria-controls="alertes" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-bell"></span> Mes alertes</a></li>
            <li role="presentation"><a href="#invitations" aria-controls="invitations" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-envelope"></span> Mes Invitations</a></li>
            <li role="presentation"><a href="#abo" aria-controls="abo" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-credit-card"></span> Abonnement Prenium</a></li>
        </ul>

        <!-- Tabs -->
        <div class="tab-content">
            <br />
            <div role="tabpanel" class="tab-pane active" id="commandes">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Evènement</th>
                            <th>Quantité</th>
                            <th>Produit</th>
                            <th>Total €</th>
                            <th>Status</th>
                            <th>Facture</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($commandes)) {
                            ?>
                            <tr class="info">
                                <td colspan=7 style="text-align: center">Vous n'avez encore acheter aucun produit chez nous</td>
                            </tr>
                        <?php } else {
                            /** @var $commande \model\Commande */
                            foreach($commandes as $key => $commande) {
                                $class = "info";
                                $status = "En cours de livraison";
                                if($key%2 == 0) {
                                    $class = "warning";
                                }
                                if($commande->getLivrer()) {
                                    $status = "Livrer";
                                }
                        ?>
                        <tr class="<?php echo $class; ?>">
                            <td><?php echo $commande->getDateCommande(); ?></td>
                            <td><?php echo $commande->getLibelleEvent(); ?></td>
                            <td><?php echo $commande->getQuantite(); ?></td>
                            <td><?php echo $commande->getLibelleProduit(); ?></td>
                            <td><?php echo $commande->getTotal(); ?></td>
                            <td><?php echo $status ?></td>
                            <td><a href="generatePDF.php?idCommande=<?php echo $commande->getId(); ?>">Voir facture</a></td>
                        </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="informations">
                <div class="container">
                    <div id="accountSuccessInfos" class="alert alert-success hideBlock" role="alert">Vos modifications ont bien été prise en compte. </div>
                    <form method="post" id="myInfos">
                        <div id="accountErrorNom" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Veuillez saisir un nom valide
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control" placeholder="Nom" value="<?php echo $client->getNom(); ?>">
                        </div>
                        <div id="accountErrorPrenom" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Veuillez saisir un prénom valide
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" class="form-control" placeholder="Prénom" value="<?php echo $client->getPrenom(); ?>">
                        </div>
                        <div id="accountErrorDate" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Veuillez saisir une date de naissance valide
                        </div>
                        <div class="form-group">
                            <label for="dateNaissance">Date de naissance</label>
                            <input type="" data-uk-datepicker="{format:'DD-MM-YYYY'}" name="date" class="form-control" placeholder="27-05-1989" value="<?php echo(date('d-m-Y',strtotime($client->getDateNaissance()))); ?>">
                        </div>
                        <div id="accountErrorTel" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Veuillez saisir un numéro de téléphone valide
                        </div>
                        <div class="form-group">
                            <label for="tel">Téléphone</label>
                            <input type="tel" name="tel" class="form-control" placeholder="0654789872" value="<?php echo $client->getTel(); ?>">
                        </div>
                        <div id="accountErrorEmail2" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            L'adresse email que vous avez saisie est déjà prise.
                        </div>
                        <div id="accountErrorEmail" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Veuillez saisir une adresse email valide
                        </div>
                        <div class="form-group">
                            <label for="email">Adresse mail</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Adresse email" value="<?php echo $client->getEmail(); ?>">
                        </div>
                        <button id="formInfos" type="submit" class="btn btn-success">Modifier</button>
                    </form>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="invitations">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Evènement</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $invitations = $controlClient->getInvitations($client->getId());
                    if(empty($invitations)) {
                        ?>
                        <tr class="info">
                            <td colspan=7 style="text-align: center">Vous n'avez encore aucune invitation</td>
                        </tr>
                    <?php } else {
                        /** @var $invitation \model\Invitation */
                        foreach($invitations as $key => $invitation) {
                            $status = "prochainement";
                            $debDate = date_create($invitation->getDateDebut())->getTimestamp();
                            $endDate = date_create($invitation->getDateFin())->getTimestamp();
                            if (time() > $debDate && time() > $endDate) {
                                $status = "ouvert";
                            } elseif ( time() > $endDate) {
                                $status = "fermer";
                            }
                            $class = "info";
                            if($key%2 == 0) {
                                $class = "warning";
                            }
                            ?>
                            <tr class="<?php echo $class; ?>">
                                <td><?php echo $invitation->getLibelleEvent(); ?></td>
                                <td><?php echo $invitation->getDateDebut(); ?></td>
                                <td><?php echo $invitation->getDateFin(); ?></td>
                                <td><?php echo $status; ?></td>
                            </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </div>

            <!-- récupération satut checked newsletters et alerte-->
            <?php
                $checkedAlerte = $checkedNewsletters = '';

                if($client->getAlerte()){
                    $checkedAlerte = 'checked';
                }

                if($client->getNewsletters()){
                    $checkedNewsletters = 'checked';
                }
            ?>
            <!-- -->

            <div role="tabpanel" class="tab-pane" id="alertes">
                <div class="container">
                    <div id="accountSuccessAlerts" class="alert alert-success hideBlock" role="alert">Vos modifications ont bien été prises en compte. </div>
                    <form method="post" id="myAlerts">
                        <p>Recevoir nos newsletters : </p>
                        <div class="onoffswitch">
                            <input type="checkbox" name="newsletter" class="onoffswitch-checkbox" id="switchNewsletter" <?php echo $checkedNewsletters; ?>>
                            <label class="onoffswitch-label" for="switchNewsletter"></label>
                        </div> <br>
                        <p>Recevoir des notifications par mail :</p>
                        <div class="onoffswitch">
                            <input type="checkbox" name="alerte" class="onoffswitch-checkbox" id="switchAlerte" <?php echo $checkedAlerte; ?>>
                            <label class="onoffswitch-label" for="switchAlerte"></label>
                        </div>
                        <br>
                        <br>
                        <button id="formAlerts" type="submit" class="btn btn-success">Modifier</button>
                    </form>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="modifPassword">
                <div class="container">
                    <div id="accountSuccessPwd" class="alert alert-success hideBlock" role="alert">Votre mot de passe a été modifié. </div>
                    <form method="post" id="updatePassword">
                        <div id="accountErrorPwdActuel" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Mot de passe incorrect.
                        </div>
                        <div class="form-group">
                            <label for="pwdAcutel">Mot de passe actuel</label>
                            <input type="password" name="pwdAcutel" class="form-control" id="pwdActuel" placeholder="Mot de Passe actuel">
                        </div>
                        <div id="accountErrorPwd" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Veuillez saisir un mot de passe valide
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mot de passe</label>
                            <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Mot de Passe">
                        </div>
                        <div id="accountErrorPwd2" class="alert alert-danger hideBlock" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                            Les 2 mots de passe sont différents
                        </div>
                        <div class="form-group">
                            <label for="pwd">Confirmation du mot de passe</label>
                            <input type="password" name="pwd2" class="form-control" id="pwd2" placeholder="Mot de Passe">
                        </div>
                        <button id="formPwd" type="submit" class="btn btn-success">Modifier</button>
                    </form>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="abo">
                <div class="container">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Avantages compte PRENIUM</h3>
                        </div>

                        <?php
                            $finAbo = date_create($client->getDateFinAbo());
                            if( time() < $finAbo->getTimestamp()) {
                            ?>
                            <ul class="list-group MT15 ML10 MR10">
                                <li class="list-group-item list-group-item-info">Date de fin d'abonnement prenium : <?php echo $client->getDateFinAbo(); ?> </li>
                            </ul>
                        <?php } ?>

                        <div id="aboPrenium" class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-4 cardAbo">
                                    <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                                    <h4>Accès VIP = pas d'attente lors des évènements</h4>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 cardAbo">
                                    <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
                                    <h4>Des exclusivités sur les produits</h4>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 cardAbo">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                    <h4>Accès aux évènements de votre choix = pas de tirage au sort</h4>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 cardAbo">
                                    <span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
                                    <h4>Livraison gratuite à domicile des produits achetés (sous 24h)</h4>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 cardAbo">
                                    <span class="glyphicon glyphicon-gift" aria-hidden="true"></span>
                                    <h4>Des bons de réduction exclusifs à valoir sur nos prochaines ventes</h4>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4 cardAbo" id="subscribe" onclick="document.getElementById('subcribePaypal').submit();">
                                    <span class=" glyphicon glyphicon-piggy-bank" aria-hidden="true"></span>
                                    <h4>Inscription pour seulement 30€ par an !</h4>
                                    <form id='subcribePaypal' action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                        <input type="hidden" name="cmd" value="_s-xclick">
                                        <input type="hidden" name="hosted_button_id" value="WQH6PRWJHK35J">
                                        <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_subscribe_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br />
    <br />

<?php } else { ?>
    <div id="accountNotLogged">
        <span  class="alert alert-danger">Vous devez être connecté pour accéder a votre compte!</span><br><br>
    </div>
<?php } ?>
</section>
<?php
include('template/footer.php');
