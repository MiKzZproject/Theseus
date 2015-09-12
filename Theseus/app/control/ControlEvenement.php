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
     * @param $id
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
                                            :miniature1');
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
        $req->bindValue(':image',$evenement->getTheme());
        $req->bindValue(':miniature1',$evenement->getMiniature1());

        $req->execute();

    }

    /**
     * @param $idEvent
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
        $req->bindValue(':image',$evenement->getTheme());
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
        $req->bindValue(':id',$id->getId());

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
}
