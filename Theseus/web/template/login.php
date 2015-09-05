<?php
$controlLogin = new \control\ControlClient(\config\Db::getInstance());

if(isset($_POST['login']) && isset($_POST['password'])){
    $array = array(
        "login" => $_POST['login'],
        "pass" => $_POST['password'],
    );
    $client = $controlLogin->connection($array);
    if($client){
        $session = $controlLogin->isLogged($client->getId());
        $_SESSION['login'] = $session;
        ?>
        <script>window.location.href='index.php'</script>
        <?php
    }else{
        ?>
        <p class="bg-warning"><br>Le login / Password n'existe pas !<br><br></p><br><br>
        <?php
    }
}
?>