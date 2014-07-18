<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 14:01
 */


namespace control;

use model\Client;

class ControlClient
{

    /** @var */
    private $bdd;

    /**
     * @param $db
     */
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    /**
     * @param Client $client
     * @return bool
     */
    public function add(Client $client)
    {

        $req = $this->bdd->prepare("INSERT INTO client (nom,prenom,dateNaissance,adresse,cp,ville,mail,tel,mdp)
                                   VALUES(:nom,:prenom,:dateNaissance,:adresse,:cp,:ville,:mail,:tel,:mdp)");
        $req->bindValue(':nom', $client->getNom());
        $req->bindValue(':prenom', $client->getPrenom());
        $req->bindValue(':dateNaissance', $client->getDateNaissance());
        $req->bindValue(':adresse', $client->getAdresse());
        $req->bindValue(':cp', $client->getCp());
        $req->bindValue(':ville', $client->getVille());
        $req->bindValue(':mail', $client->getMail());
        $req->bindValue(':tel', $client->getTel());
        $req->bindValue(':mdp', $client->getMdp());
        if ($req->execute()) {
            return true;
        } else {
            return false;
            //log
        }

    }

    public function delete()
    {

    }

    public function modify()
    {

    }
}
