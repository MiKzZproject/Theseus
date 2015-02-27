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
        $req = $this->bdd->prepare('SELECT * FROM evenement');
        $req->execute();
        while($result = $req->fetch()){
            $evenement = new Evenement($result);
            $evenements[] = $evenement;
        }
        return $evenements;
    }

    public function addEvenement($evenement){
        $req = $this->bdd->prepare('INSERT INTO evenement (libelle,description,adresse,cp,ville,dateDebut,dateFin,place,image) values ( :libelle, :description, :adresse, :cp, :ville, :dateDebut, :dateFin, :place, :image');
        $req->bindValue(':libelle',$evenement->getLibelle());
        $req->bindValue(':description',$evenement->getDescription());
        $req->bindValue(':adresse',$evenement->getAdresse());
        $req->bindValue(':cp',$evenement->getCp());
        $req->bindValue(':ville',$evenement->getVille());
        $req->bindValue(':dateDebut',$evenement->getDateDebut());
        $req->bindValue(':dateFin',$evenement->getDateFin());
        $req->bindValue(':place',$evenement->getPlace());
        $req->bindValue(':image',$evenement->getImage());

        $req->execute();
    }

}
