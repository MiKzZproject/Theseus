<?php
    use model\Admin;
    require_once 'config/config.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <title>Theseus</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1>Administration Theseus</h1><br><br>

<?php

if(isset($_SESSION['admin'])){
    ?>
    <button class="btn btn-warning" onclick="deconnexion()">Deconnection</button>
    <section id="admin_page">
    </section>
    <br><br>
    <section id="menu">
        <span id="login_result"></span>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand a nd toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Menu</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li id="menu_produit"><a onclick="window.location.hash='#produit';gestionPage('produit');">Produits</a></li>
                        <li id="menu_client"><a onclick="window.location.hash='#client';gestionPage('client');">Clients</a></li>
                        <li id="menu_categorie"><a onclick="window.location.hash='#categorie';gestionPage('categorie');">Catégories</a></li>
                        <li id="menu_evenement"><a onclick="window.location.hash='#evenement';gestionPage('evenement');">Evènements</a></li>
                        <li id="menu_newsletters"><a onclick="window.location.hash='#newsletters';gestionPage('newsletters');">Newsletters</a></li>
                        <li id="menu_admin"><a onclick="window.location.hash='#admin';gestionPage('admin');">Admin</a></li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </section>
    <div id="page">

    </div>
    <?php
}else{
    ?>
    <section id="login">
        <h4>Vous n'êtes pas connecté ! </h4><br><br>

        <span id="login_result"></span>
        <label>Login </label><br>
        <input class="form-control" type="text" id="login_login"><br>
        <label>Password </label><br>
        <input class="form-control" type="password" id="login_pass"><br>

        <button class="btn btn-success" onclick="connection()">Connection</button>

    </section>
<?php
}
?>
<br><br>
<br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<script src="js/produit.js"></script>
<script src="js/categorie.js"></script>
<script src="js/client.js"></script>
<script src="js/admin.js"></script>
<script src="js/newsletter.js"></script>
<script src="js/event.js"></script>

</body>
</html>