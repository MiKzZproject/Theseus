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
use model\Commande;
use model\Invitation;

/**
 * Class ControlClient
 * @package control
 */
class ControlClient {

    /** @var \PDO */
    private $db;

    /**
     * @param Db $db
     */
    public function __construct(Db $db)
    {
        if (!$db) throw new \InvalidArgumentException("First argument is expected to be a valid PDO instance, NULL given");
        $this->db = $db->getPDOInstance();
    }

    /**
     * @param $array
     * @return bool|Client
     */
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

    /**
     * @return bool
     */
    public function isLogged() {
        if(isset($_SESSION['login'])) {
            /** @var Client */
            $client = $_SESSION['login'];
            $req = $this->db->prepare('SELECT * FROM logged WHERE idClient = :id');
            $req->bindValue(':id', $client->getId());
            $req->execute();

            if ($result = $req->fetch()) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
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

    /**
     * @return array|bool
     */
    public function getClients(){
        $req = $this->db->prepare('SELECT * FROM client');
        $req->execute();
        $clients = false;
        while($result = $req->fetch()){
            $client = new client($result);
            $clients[] = $client;
        }
        return $clients;
    }

    public function getClientsOpt($value,$type){
        if(empty($value)){
            $req = $this->db->prepare('SELECT * FROM client');
        }else{
            if(!$type){
                $req = $this->db->prepare('SELECT * FROM client where nom like :nom');
                $req->bindValue(':nom', '%'.$value.'%');
            }else{
                $req = $this->db->prepare('SELECT * FROM client where email like :email');
                $req->bindValue(':email', '%'.$value.'%');
            }
        }
        $req->execute();
        $clients = false;
        while($result = $req->fetch()){
            $clients[] = new Client($result);
        }
        return $clients;
    }

    public function getClientByEvent($idEvent){
        $req = $this->db->prepare('SELECT * FROM client where id in (select idClient from evenement_client where idEvenement = :idEvent)');
        $req->bindValue(':idEvent', $idEvent);
        $req->execute();

        $clients = false;
        while($result = $req->fetch()){
            $clients[] = new Client($result);
        }
        return $clients;
    }

    /**
     * @param $array
     * @return bool|Client
     */
    public function getClient($array){
        $req = $this->db->prepare('SELECT * FROM client WHERE email = :login AND pwd = :pass');
        $req->bindValue(':login', $array['login']);
        $req->bindValue(':pass', $array['pass']);
        $req->execute();
        $result = $req->fetch();
        $client = false;
        if($result){
            $client = new Client($result);
        }
        return $client;
    }

    /**
     * @param $email
     * @return bool|Client
     */
    public function getClientByMail($email){
        $req = $this->db->prepare('SELECT id FROM client WHERE email = :login');
        $req->bindValue(':login', $email);
        $req->execute();
        $result = $req->fetch();
        $client = false;
        if($result){
            $client = new Client($result);
        }
        return $client;
    }

    public function getClientById($id){
        $req = $this->db->prepare('SELECT * FROM client WHERE id = :id');
        $req->bindValue(':id', $id);
        $req->execute();
        $result = $req->fetch();
        $client = false;
        if($result){
            $client = new Client($result);
        }
        return $client;
    }

    /**
     * @param Client $client
     * @return bool
     */
    public function addClient(Client $client){
        $req = $this->db->prepare('INSERT INTO client values (null,:nom,:prenom,:dateNaissance,:tel,:email,:pwd, CURRENT_TIMESTAMP ,:newsletters,:alerte,null,null,null,2)');
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

    /**
     * @param Client $client
     * @return bool
     */
    public function updateClient(Client $client){
        $req = $this->db->prepare('UPDATE client SET  nom = :nom,
                                                        prenom=:prenom,
                                                        dateNaissance=:dateNaissance,
                                                        tel=:tel,
                                                        email=:email,
                                                        pwd=:pwd,
                                                        newsletters=:newsletters,
                                                        alerte=:alerte,
                                                        ratio=:ratio
                                                        WHERE id=:id');
        $req->bindValue(':id',$client->getId());
        $req->bindValue(':nom',$client->getNom());
        $req->bindValue(':prenom',$client->getPrenom());
        $req->bindValue(':pwd',$client->getPwd());
        $req->bindValue(':dateNaissance',$client->getDateNaissance());
        $req->bindValue(':tel',$client->getTel());
        $req->bindValue(':email',$client->getEmail());
        $req->bindValue(':newsletters',$client->getNewsletters());
        $req->bindValue(':alerte',$client->getAlerte());
        $req->bindValue(':ratio',$client->getRatio());
        return $req->execute();
    }
    public function updateClientAdmin(Client $client){
        $req = $this->db->prepare('UPDATE client SET  nom = :nom,
                                                        prenom=:prenom,
                                                        dateNaissance=:dateNaissance,
                                                        tel=:tel,
                                                        email=:email,
                                                        newsletters=:newsletters,
                                                        alerte=:alerte,
                                                        ratio=:ratio,
                                                        dateDebutAbo=:dateDebutAbo,
                                                        dateFinAbo=:dateFinAbo
                                                        WHERE id=:id');
        $req->bindValue(':id',$client->getId());
        $req->bindValue(':nom',$client->getNom());
        $req->bindValue(':prenom',$client->getPrenom());
        $req->bindValue(':dateNaissance',$client->getDateNaissance());
        $req->bindValue(':tel',$client->getTel());
        $req->bindValue(':email',$client->getEmail());
        $req->bindValue(':newsletters',$client->getNewsletters());
        $req->bindValue(':alerte',$client->getAlerte());
        $req->bindValue(':ratio',$client->getRatio());
        $req->bindValue(':dateDebutAbo',$client->getDateDebutAbo());
        $req->bindValue(':dateFinAbo',$client->getDateFinAbo());
        return $req->execute();
    }
    /**
     * @param $id
     * @return bool
     */
    public function deleteClient($id){
        $req = $this->db->prepare('DELETE FROM client WHERE id=:id');
        $req->bindValue(':id', $id);
        return $req->execute();
    }

    /**
     * @param int $id
     * @return array|bool
     */
    public function getCommandes($id){
        $req = $this->db->prepare('SELECT idCommande as id, P.libelle as libelleProduit, E.libelle as libelleEvent, quantite, prix, datecommande, livrer, quantite*prix as total
                                   FROM produit P, commande_produit C, evenement E
                                   WHERE E.id = C.idEvent
                                   AND P.id = C.idProduit
                                   AND C.idClient = :id');
        $req->bindValue(':id',$id);
        $req->execute();
        $commandes = false;
        while($result = $req->fetch()){
            $commande = new Commande($result);
            $commandes[] = $commande;
        }
        return $commandes;
    }

    /**
     * @param int $idCommande
     * @param int $idClient
     * @return array|bool
     */
    public function getCommande($idCommande, $idClient){
        $req = $this->db->prepare('SELECT idCommande as id, P.libelle as libelleProduit, E.libelle as libelleEvent, quantite, prix, datecommande, livrer, quantite*prix as total
                                   FROM produit P, commande_produit C, evenement E
                                   WHERE E.id = C.idEvent
                                   AND P.id = C.idProduit
                                   AND C.idCommande = :idCommande
                                   AND C.idClient = :idClient');
        $req->bindValue(':idCommande',$idCommande);
        $req->bindValue(':idClient',$idClient);
        $req->execute();
        $commande = false;
        if($result = $req->fetch()){
            $commande = new Commande($result);
        }
        return $commande;
    }

    /**
     * @param int $id
     * @return array|bool
     */
    public function getInvitations($id){
        $req = $this->db->prepare('SELECT E.libelle as libelleEvent, dateDebut, dateFin
                                   FROM evenement E, evenement_client EC
                                   WHERE E.id = EC.idEvenement
                                   AND EC.participer = 1
                                   AND EC.idClient = :id
                                   ORDER BY E.dateDebut');
        $req->bindValue(':id',$id);
        $req->execute();
        $invitations = false;
        while($result = $req->fetch()){
            $invitation = new Invitation($result);
            $invitations[] = $invitation;
        }
        return $invitations;
    }
}