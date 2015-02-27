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


}
