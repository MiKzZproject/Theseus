<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 14:01
 */


namespace control;
use model\Client;

class ControlClient {

    /** @var   */
    private $db;

    /**
     * @param $db
     */
    public function __construct($db){
        $this->$db = $db;
    }

    public function add(Client $client){

        $req = $this->db->prepare("INSER INTO client (nom,prenom,dateNaissance,adresse,cp,ville,mail,tel,mdp)
                                   VALUES(:nom,:prenom,:dateNassaince,:adresse,:cp,:ville,:mail,:tel,:mdp);
                                            ");
        $req->bindValue(':nom', $client->getNom());
        $req->bindValue(':prenom', $client->getPrenom());
        $req->bindValue(':dateNaissance', $client->getDateNaissance());
        $req->bindValue(':adresse', $client->getAdresse());
        $req->bindValue(':cp', $client->getCp());
        $req->bindValue(':ville', $client->getVille());
        $req->bindValue(':mail', $client->getMail());
        $req->bindValue(':tel', $client->getTel());
        $req->bindValue(':mdp', $client->getMdp());
        $req->execute();
        $red = $req->fetchAll();
    }
    public function delete(){

    }
    public function modify(){

    }
}
