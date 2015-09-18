<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 27/02/2015
 * Time: 09:45
 */

namespace control;


use config\Db;
use model\Client;
use model\Evenement;
use model\Inscrit;
use model\Produit;

/**
 * Class ControlEvenement
 * @package control
 */
class ControlEvenement {

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
     * @return array|bool
     */
    public function getEvenements(){
        $req = $this->db->prepare('SELECT *
                                    FROM evenement
                                    ORDER BY dateDebut ASC');
        $req->execute();
        $evenements = false;
        while($result = $req->fetch()){
            $evenement = new Evenement($result);
            $evenements[] = $evenement;
        }
        return $evenements;
    }

    /**
     * @param int $id
     * @return bool|Evenement
     */
    public function getEvenement($id){
        $req = $this->db->prepare('SELECT * FROM evenement WHERE id = :id');
        $req->bindValue(':id', $id);
        $req->execute();
        $result = $req->fetch();
        $event = false;
        if($result){
            $event = new Evenement($result);
        }
        return $event;
    }

    /**
     * @param int $id
     * @return bool|Evenement
     */
    public function getInscritEvenement($id){
        $req = $this->db->prepare('SELECT * FROM evenement WHERE id = :id');
        $req->bindValue(':id', $id);
        $req->execute();
        $result = $req->fetch();
        $event = false;
        if($result){
            $event = new Evenement($result);
        }
        return $event;
    }

    /**
     * @param int $value
     * @param int $type
     * @return bool|Evenement
     */
    public function getEventsOpt($value,$type){
        if(empty($value)){
            $req = $this->db->prepare('SELECT * FROM evenement');
        }else{
            if(!$type){
                $req = $this->db->prepare('SELECT * FROM evenement where libelle like :libelle');
                $req->bindValue(':libelle', '%'.$value.'%');
            }else{
                $req = $this->db->prepare('SELECT * FROM evenement where dateDebut like :date');
                $req->bindValue(':date', '%'.$value.'%');
            }
        }
        $req->execute();
        $events = false;
        while($result = $req->fetch()){
            $event = new Evenement($result);
            $events[] = $event;
        }
        return $events;
    }

    /**
     * @param Evenement $evenement
     */
    public function addEvenement($evenement){
        $req = $this->db->prepare('INSERT INTO evenement (libelle,lieu,description,adresse,cp,ville,dateDebut,dateFin,place,image,theme,miniature1)
                                    VALUES (:libelle,
                                            :lieu,
                                            :description,
                                            :adresse,
                                            :cp,
                                            :ville,
                                            :dateDebut,
                                            :dateFin,
                                            :place,
                                            :image,
                                            :theme,
                                            :miniature1)');
        $req->bindValue(':libelle',$evenement->getLibelle());
        $req->bindValue(':lieu',$evenement->getLieu());
        $req->bindValue(':description',$evenement->getDescription());
        $req->bindValue(':adresse',$evenement->getAdresse());
        $req->bindValue(':cp',$evenement->getCp());
        $req->bindValue(':ville',$evenement->getVille());
        $req->bindValue(':dateDebut',$evenement->getDateDebut());
        $req->bindValue(':dateFin',$evenement->getDateFin());
        $req->bindValue(':place',$evenement->getPlace());
        $req->bindValue(':image',$evenement->getImage());
        $req->bindValue(':theme',$evenement->getTheme());
        $req->bindValue(':miniature1',$evenement->getMiniature1());

        $req->execute();
    }

    /**
     * @param int $idEvent
     * @param Client $client
     * @return bool
     */
    public function inscriptionEvenement($idEvent,$client){
        $req = $this->db->prepare('INSERT INTO evenement_client (idClient,idEvenement,participer)
                                    VALUES (:idClient,
                                            :idEvent,
                                            :participer)');
        $req->bindValue(':idClient',$client->getId());
        $req->bindValue(':idEvent',$idEvent);
        $req->bindValue(':participer',$client->isPrenium());
        return $req->execute();
    }

    /**
     * @param int $idEvent
     * @param Client $client
     * @return bool
     */
    public function desinscriptionEvenement($idEvent,$client){

        $req = $this->db->prepare('DELETE FROM evenement_client
                                   WHERE idEvenement = :idEvent
                                   AND idClient = :idClient');
        $req->bindValue(':idClient',$client->getId());
        $req->bindValue(':idEvent',$idEvent);
        return $req->execute();
    }

    /**
     * @param Evenement $evenement
     */
    public function updateEvenement($evenement){
        $req = $this->db->prepare('UPDATE evenement
                                    SET libelle = :libelle,
                                        lieu = :lieu,
                                        description = :description,
                                        adresse = :adresse,
                                        cp = :cp,
                                        ville = :ville,
                                        dateDebut = :dateDebut,
                                        dateFin = :dateFin,
                                        place = :place,
                                        image = :image,
                                        theme = :theme,
                                        miniature1 = :miniature1
                                    WHERE id = :id ');
        $req->bindValue(':id',$evenement->getId());
        $req->bindValue(':libelle',$evenement->getLibelle());
        $req->bindValue(':lieu',$evenement->getLieu());
        $req->bindValue(':description',$evenement->getDescription());
        $req->bindValue(':adresse',$evenement->getAdresse());
        $req->bindValue(':cp',$evenement->getCp());
        $req->bindValue(':ville',$evenement->getVille());
        $req->bindValue(':dateDebut',$evenement->getDateDebut());
        $req->bindValue(':dateFin',$evenement->getDateFin());
        $req->bindValue(':place',$evenement->getPlace());
        $req->bindValue(':image',$evenement->getImage());
        $req->bindValue(':theme',$evenement->getTheme());
        $req->bindValue(':miniature1',$evenement->getMiniature1());

        $req->execute();

    }

    /**
     * @param $id
     */
    public function deleteEvenement($id){
        $req = $this->db->prepare('DELETE
                                    FROM evenement
                                    WHERE id = :id ');
        $req->bindValue(':id',$id);

        $req->execute();

    }

    /**
     * @param $idEvent
     * @return array
     */
    public function getProduitsByEvent($idEvent){
        $req = $this->db->prepare("SELECT *
                                    FROM evenement_produit EP, produit P
                                    WHERE P.id = EP.idProduit
                                    AND EP.idEvenement = :idEvent
                                    ORDER BY RAND() LIMIT 2");
        $req->bindValue(':idEvent',$idEvent);
        $req->execute();
        $produits = array();
        while($result = $req->fetch()){
            $produit = new Produit(array(
                "libelle" => $result['libelle'],
                "miniature" => $result['miniature']
            ));
            $produits[] = $produit;
        }
        return $produits;
    }

    /**
     * @return mixed
     */
    public function getEventsCount(){
        $sql = "SELECT count(*) as count FROM evenement ";
        $req = $this->db->prepare($sql);
        $req->execute();
        $result = $req->fetch();
        return $result['count'];
    }

    /**
     * @param $page
     * @return array|bool
     */
    public function getEventsPagination($page){
        /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
        $nbEvents = \config\Theseus::NBPERPAGEEVENT;
        $page = ($page-1) * $nbEvents;
        $sql = 'SELECT * FROM evenement ORDER BY dateDebut ASC LIMIT '.$page.','.$nbEvents;
        $req = $this->db->prepare($sql);
        $req->execute();
        while($result = $req->fetch()){
            $evenement = new Evenement($result);
            $evenements[] = $evenement;
        }
        return !empty($evenements) ? $evenements : false;
    }

    /**
     * @return mixed
     */
    public function getEventsByProductCount($idProduit){
        $sql = "SELECT count(*) as count
                FROM evenement_produit
                WHERE idProduit = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue(':id',$idProduit);
        $req->execute();
        $result = $req->fetch();
        return $result['count'];
    }

    /**
     * @param $page
     * @return array|bool
     */
    public function getEventsByProductPagination($page, $idProduit){
        /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
        $nbEvents = \config\Theseus::NBPERPAGEEVENT;
        $page = ($page-1) * $nbEvents;
        $sql = 'SELECT *
                FROM evenement E, evenement_produit EP
                WHERE EP.idEvenement = E.id
                AND idProduit = :id
                ORDER BY dateDebut ASC
                LIMIT '.$page.','.$nbEvents;
        $req = $this->db->prepare($sql);
        $req->bindValue(':id',$idProduit);
        $req->execute();
        $evenements = false;
        while($result = $req->fetch()){
            $evenement = new Evenement($result);
            $evenements[] = $evenement;
        }
        return $evenements;
    }

    /**
     * @param int $idEvent
     * @param int $idClient
     * @return bool
     */
    public function isSubscribed($idEvent, $idClient){
        $sql = 'SELECT *
                FROM evenement_client
                WHERE idEvenement = :idEvent
                AND idClient = :idClient';
        $req = $this->db->prepare($sql);
        $req->bindValue(':idEvent',$idEvent);
        $req->bindValue(':idClient',$idClient);
        $req->execute();
        $subscribe = false;
        if($req->fetch()) {
            $subscribe = true;
        }
        return $subscribe;
    }

    /**
     * @param int $idEvent
     * @return bool
     */
    public function getInvitations($id){
        $req = $this->db->prepare('SELECT c.id as idClient, ratio
                                   FROM evenement_client EC, client C
                                   WHERE EC.idEvenement = :id
                                   AND C.id = EC.idClient
                                   AND EC.participer = 0');
        $req->bindValue(':id',$id);
        $req->execute();
        $invitations = false;
        while($result = $req->fetch()){
            $invitations[] = new Inscrit($result);
        }
        return $invitations;
    }

    public function clientDelete($idEvent,$idClient){
        $req = $this->db->prepare('DELETE FROM evenement_client
                                    WHERE idEvenement = :idEvent AND idClient = :idClient');

        $req->bindValue(':idEvent',$idEvent);
        $req->bindValue(':idClient',$idClient);
        $req->execute();
    }
    public function produitDelete($idEvent,$idProduit){
        $req = $this->db->prepare('DELETE FROM evenement_produit
                                    WHERE idEvenement = :idEvent AND idProduit = :idProduit');

        $req->bindValue(':idEvent',$idEvent);
        $req->bindValue(':idProduit',$idProduit);
        $req->execute();
    }

    public function addEventProduit($idEvenement,$idProduit){
        $req = $this->db->prepare('INSERT INTO evenement_produit (idEvenement,idProduit)
                                    VALUES (:idEvenement,:idProduit)');
        $req->bindValue(':idEvenement', $idEvenement);
        $req->bindValue(':idProduit', $idProduit);

        $req->execute();
    }

    public function addEventClient($idEvenement,$idClient){
        $req = $this->db->prepare('INSERT INTO evenement_client (idEvenement,idClient,participer)
                                    VALUES (:idEvenement,:idClient,1)');
        $req->bindValue(':idEvenement', $idEvenement);
        $req->bindValue(':idClient', $idClient);
        $req->execute();
    }

    public function updateEventClient($idEvenement,$idClient){
        $req = $this->db->prepare('UPDATE evenement_client
                                    SET participer = 1
                                    WHERE idEvenement = :idEvenement
                                    AND idClient = :idClient');
        $req->bindValue(':idEvenement', $idEvenement);
        $req->bindValue(':idClient', $idClient);

        $req->execute();
    }
}
