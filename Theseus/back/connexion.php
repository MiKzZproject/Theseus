<?php
require('config/config.php');
$controlAdmin = new \control\ControlAdmin($bdd);

if(isset($_POST['login']) && isset($_POST['pass'])){
    $array = array(
        "login" => $_POST['login'],
        "pass" => $_POST['pass'],
    );
    if($controlAdmin->connection($array)){
        $admin = $controlAdmin->getAdmin($array);
       $_SESSION['admin'] = $admin;
        ?>
        <script>window.location.href='index.php'</script>
        <?php
    }else{
        ?>
        <p class="bg-warning"><br>Le login / Password n'existe pas !<br><br></p><br><br>
        <?php
    }

}