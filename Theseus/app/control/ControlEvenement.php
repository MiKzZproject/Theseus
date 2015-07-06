<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 27/02/2015
 * Time: 09:45
 */

namespace control;


use model\Evenement;

class ControlEvenement {
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function getEvenements(){
        $req = $this->bdd->prepare('SELECT *
                                    FROM evenement
                                    ORDER BY dateDebut ASC');
        $req->execute();

        while($result = $req->fetch()){
            $evenement = new Evenement($result);
            $evenements[] = $evenement;
        }
        return $evenements;
    }

    public function addEvenement($evenement){
        $req = $this->bdd->prepare('INSERT INTO evenement (libelle,lieu,description,adresse,cp,ville,dateDebut,dateFin,place,image,theme,miniature1)
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

    public function updateEvenement($evenement){
        $req = $this->bdd->prepare('UPDATE evenement
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

    public function deleteEvenement($id){
        $req = $this->bdd->prepare('DELETE
                                    FROM evenement
                                    WHERE id = :id ');
        $req->bindValue(':id',$id->getId());

        $req->execute();

    }
}
