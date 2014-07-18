<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 15:14
 */

namespace control;
use model\Evenement;


class ControlEvenement {

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
    * @param Evenement $evenement
     * @return bool
     */
    public function add(Evenement $evenement)
    {

        $req = $this->bdd->prepare("INSERT INTO evenement (libelle,adresse,cp,ville,dateHeure,place)
                                   VALUES(:libelle,:adresse,:cp,:ville,:dateHeure,:place)");
        $req->bindValue(':libelle', $evenement->getLibelle());
        $req->bindValue(':adresse', $evenement->getAdresse());
        $req->bindValue(':cp', $evenement->getCp());
        $req->bindValue(':ville', $evenement->getVille());
        $req->bindValue(':dateHeure', $evenement->getDateHeure());
        $req->bindValue(':place', $evenement->getPlace());
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

