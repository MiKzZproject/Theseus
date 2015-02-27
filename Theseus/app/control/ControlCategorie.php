<?php
/**
 * Created by PhpStorm.
 * User: rpid6
 * Date: 26/02/2015
 * Time: 14:37
 */

namespace control;

use model\Categorie;

class ControlCategorie {

    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function getCategories(){
        $req = $this->bdd->prepare('SELECT * FROM categorie');
        $req->execute();
        while($result = $req->fetch()){
            $categorie = new Categorie($result);
            $categories[] = $categorie;
        }
        return $categories;
    }

    public function getCategorie($id){
        $req = $this->bdd->prepare('SELECT * FROM categorie WHERE id = :id');
        $req->bindValue(':id',$id);
        $req->execute();
        if($result = $req->fetch()){
            $categorie = new Categorie($result);
        }
        return $categorie;
    }

    public function addCategorie($categorie){
        $req = $this->bdd->prepare('INSERT INTO categorie values (:nom,:image)');
        $req->bindValue(':nom',$categorie->getNom());
        $req->bindValue(':nom',$categorie->getDescription());
        $req->bindValue(':image',$categorie->getImage());
    }
}