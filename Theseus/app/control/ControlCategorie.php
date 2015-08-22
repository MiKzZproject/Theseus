<?php
/**
 * Created by PhpStorm.
 * User: rpid6
 * Date: 26/02/2015
 * Time: 14:37
 */

namespace control;

use config\Db;
use model\Categorie;

class ControlCategorie {

    private $db;

    public function __construct(Db $db)
    {
        if (!$db) throw new InvalidArgumentException("First argument is expected to be a valid PDO instance, NULL given");
        $this->db = $db->getPDOInstance();
    }

    public function getCategories(){
        $req = $this->db->prepare('SELECT * FROM categorie');
        $req->execute();
        while($result = $req->fetch()){
            $categorie = new Categorie($result);
            $categories[] = $categorie;
        }
        return $categories;
    }

    public function getCategorie($id){
        $req = $this->db->prepare('SELECT * FROM categorie WHERE id = :id');
        $req->bindValue(':id',$id);
        $req->execute();
        if($result = $req->fetch()){
            $categorie = new Categorie($result);
        }
        return $categorie;
    }

    public function addCategorie($categorie){
        $req = $this->db->prepare('INSERT INTO categorie values (null, :nom,:image)');
        $req->bindValue(':nom',$categorie->getNom());
        $req->bindValue(':nom',$categorie->getDescription());
        $req->bindValue(':image',$categorie->getImage());
        return $req->execute();
    }

    public function updateCategorie($categorie) {
        $req = $this->db->prepare('UPDATE categorie SET nom = :nom, image=:image WHERE id=:id');
        $req->bindValue(':id',$categorie->getId());
        $req->bindValue(':nom',$categorie->getNom());
        $req->bindValue(':image',$categorie->getImage());
        return $req->execute();
    }

    public function deleteCategorie($id) {
        $req = $this->db->prepare('DELETE FROM categorie WHERE id=:id');
        $req->bindValue(':id',$id);
        return $req->execute();
    }
}