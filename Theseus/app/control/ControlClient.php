<?php
/**
 * Created by PhpStorm.
 * User: rpid6
 * Date: 26/02/2015
 * Time: 16:43
 */

namespace control;


use model\Client;

class ControlClient {
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function getClients(){
        $req = $this->bdd->prepare('SELECT * FROM client');
        $req->execute();
        while($result = $req->fetch()){
            $client = new client($result);
            $clients[] = $client;
        }
        return $clients;
    }

    public function addClient(Client $client){
        $req = $this->bdd->prepare('INSERT INTO client values (null,:nom,:prenom,:dateNaissance,:tel,:email,:pwd, CURRENT_TIMESTAMP ,:newsletters,:alerte)');
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
        $req = $this->bdd->prepare('UPDATE client SET  nom = :nom,
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
        $req = $this->bdd->prepare('DELETE FROM client WHERE id=:id');
        $req->bindValue(':id', $id);
        return $req->execute();
    }

}