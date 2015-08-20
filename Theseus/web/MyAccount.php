<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19/08/2015
 * Time: 14:46
 */

include('template/header.php');
?>
<h2 class="header-title green nohover">Espace Mon Compte</h2>

    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#commandes" aria-controls="commandes" role="tab" data-toggle="tab"><i class="icon-shopping-cart"></i> Mes Commandes</a></li>
            <li role="presentation"><a href="#informations" aria-controls="informations" role="tab" data-toggle="tab"><i class="icon-user"></i> Mes Informations</a></li>
            <li role="presentation"><a href="#invitations" aria-controls="invitations" role="tab" data-toggle="tab"><i class="icon-gift"></i> Mes Invitations</a></li>
            <li role="presentation"><a href="#alertes" aria-controls="alertes" role="tab" data-toggle="tab"><i class="icon-bell"></i> Mes alertes</a></li>
            <li role="presentation"><a href="#modifPassword" aria-controls="modifPassword" role="tab" data-toggle="tab"><i class="icon-pencil"></i> Modification mot de passe</a></li>
        </ul>

        <!-- Tabs -->
        <div class="tab-content">.
            <br />
            <div role="tabpanel" class="tab-pane active" id="commandes">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Num.</th>
                            <th>Date</th>
                            <th>Evènement</th>
                            <th>Lieu</th>
                            <th>Produit</th>
                            <th>Total €</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="warning">
                            <td>1</td>
                            <td>10 octobre 2015</td>
                            <td>Smatphones et Tablettes</td>
                            <td>Le Yoyo Palais de Tokyo</td>
                            <td>Iphone 6 plus</td>
                            <td>800</td>
                        </tr>
                        <tr class="info">
                            <td>2</td>
                            <td>10 octobre 2015</td>
                            <td>Smatphones et Tablettes</td>
                            <td>Le Yoyo Palais de Tokyo</td>
                            <td>Iphone 5</td>
                            <td>300</td>
                        </tr>
                        <tr class="warning">
                            <td>3</td>
                            <td>10 octobre 2015</td>
                            <td>Smatphones et Tablettes</td>
                            <td>Le Yoyo Palais de Tokyo</td>
                            <td>Samsung Galaxy Tab 4</td>
                            <td>215</td>
                        </tr>
                        <tr class="info">
                            <td>4</td>
                            <td>10 octobre 2015</td>
                            <td>Smatphones et Tablettes</td>
                            <td>Le Yoyo Palais de Tokyo</td>
                            <td>BlackBerry Q10</td>
                            <td>600</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="informations">
                <div class="control-group warning">
                    <span class="badge badge-info">Nom</span>
                    <input type="text" id="inputWarning" placeholder="nom">
                    <br />
                    <span class="badge badge-info">Prénom</span>
                    <input type="text" id="inputError" placeholder="prénom">
                    <br />
                    <span class="badge badge-info">Date de naissance</span>
                    <input type="text" id="inputInfo" placeholder="date naissance">
                    <br />
                    <span class="badge badge-info">Téléphone</span>
                    <input type="text" id="inputSuccess" placeholder="numéro téléphone">
                    <br />
                    <span class="badge badge-info">Adresse Mail</span>
                    <input type="text" id="inputSuccess" placeholder="adresse mail">
                    <br />
                    <span class="badge badge-info">Date d'inscription</span>
                    <input type="text" id="inputSuccess" placeholder="date inscription">

                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="invitations">
                invitations
            </div>

            <div role="tabpanel" class="tab-pane" id="alertes">
                alertes
            </div>

            <div role="tabpanel" class="tab-pane" id="modifPassword">
                <form class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label" for="currentPassword">Mot de Passe actuel : </label>
                        <div class="controls">
                            <input type="text" id="currentPassword" placeholder="Password actuel">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="NewPassword">Nouveau mot de passe : </label>
                        <div class="controls">
                            <input type="text" id="NewPassword" placeholder="Nouveau Password">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn">Enregistrer modifications</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <br />
    <br />

<?php
include('template/footer.php');
