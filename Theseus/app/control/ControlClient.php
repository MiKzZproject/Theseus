<?php
/**
 * Created by PhpStorm.
 * User: rpid6
 * Date: 26/02/2015
 * Time: 16:43
 */

namespace control;


use config\Db;
use model\Client;

class ControlClient {

    private $db;

    public function __construct(Db $db)
    {
        if (!$db) throw new InvalidArgumentException("First argument is expected to be a valid PDO instance, NULL given");
        $this->db = $db->getPDOInstance();
    }

    public function connection($array)
    {
        $req = $this->db->prepare('SELECT count(*) FROM client WHERE email = :login AND pwd = :pass');
        $req->bindValue(':login', $array['login']);
        $req->bindValue(':pass', $array['pass']);
        $req->execute();

        if ($req->fetchColumn()) {
            $client = $this->getClient($array);
            $session = password_hash($array['login'].time().$client->getId(), PASSWORD_BCRYPT);
            $req = $this->db->prepare('INSERT INTO logged values (null,:idClient,:sessionId ,CURRENT_TIMESTAMP)');
            $req->bindValue(':idClient',$client->getId());
            $req->bindValue(':sessionId', $session);
            $req->execute();
            return $client;
        } else {
            return false;
        }
    }

    public function isLogged() {
        if(isset($_SESSION['login'])) {
            $client = $_SESSION['login'];
            $req = $this->db->prepare('SELECT * FROM logged WHERE idClient = :id');
            $req->bindValue(':id', $client->getId());
            $req->execute();

            if ($result = $req->fetch()) {
                return true;
            }
        }
        session_unset();
        session_destroy();
        return false;
    }

    public function deconnection(){
        if(isset($_SESSION['login'])) {
            $client = $_SESSION['login'];
            $req = $this->db->prepare('DELETE FROM logged WHERE id=:id');
            $req->bindValue(':id', $client->getId());
            $req->execute();
        }
        session_unset();
        session_destroy();
        return true;
    }

    public function getClients(){
        $req = $this->db->prepare('SELECT * FROM client');
        $req->execute();
        while($result = $req->fetch()){
            $client = new client($result);
            $clients[] = $client;
        }
        return $clients;
    }

    public function getClient($array){
        $req = $this->db->prepare('SELECT * FROM client WHERE email = :login AND pwd = :pass');
        $req->bindValue(':login', $array['login']);
        $req->bindValue(':pass', $array['pass']);
        $req->execute();

        if($result = $req->fetch()){
            $client = new Client($result);
        }
        return $client;
    }

    public function addClient(Client $client){
        $req = $this->db->prepare('INSERT INTO client values (null,:nom,:prenom,:dateNaissance,:tel,:email,:pwd, CURRENT_TIMESTAMP ,:newsletters,:alerte)');
        $req->bindValue(':nom',$client->getNom());
        $req->bindValue(':prenom',$client->getPrenom());
        $req->bindValue(':dateNaissance',$client->getDateNaissance());
        $req->bindValue(':tel',$client->getTel());
        $req->bindValue(':email',$client->getEmail());
        $req->bindValue(':pwd',$client->getPwd());
        $req->bindValue(':newsletters',$client->getNewsletters());
        $req->bindValue(':alerte',$client->getAlerte());
        return $req->execute();
    }

    public function updateClient(Client $client){
        $req = $this->db->prepare('UPDATE client SET  nom = :nom,
                                                        prenom=:prenom,
                                                        dateNaissance=:dateNaissance,
                                                        tel=:tel,
                                                        email=:email,
                                                        pwd=:pwd,
                                                        newsletters=:newsletters,
                                                        alerte=:alerte
                                                        WHERE id=:id');
        $req->bindValue(':id',$client->getId());
        $req->bindValue(':nom',$client->getNom());
        $req->bindValue(':prenom',$client->getPrenom());
        $req->bindValue(':dateNaissance',$client->getDateNaissance());
        $req->bindValue(':tel',$client->getTel());
        $req->bindValue(':email',$client->getEmail());
        $req->bindValue(':pwd',$client->getPwd());
        $req->bindValue(':newsletters',$client->getNewsletters());
        $req->bindValue(':alerte',$client->getAlerte());
        return $req->execute();
    }

    public function deleteClient($id){
        $req = $this->db->prepare('DELETE FROM client WHERE id=:id');
        $req->bindValue(':id', $id);
        return $req->execute();
    }

}