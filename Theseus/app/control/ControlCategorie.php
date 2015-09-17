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

/**
 * Class ControlCategorie
 * @package control
 */
class ControlCategorie {

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
    public function getCategories(){
        $req = $this->db->prepare('SELECT * FROM categorie');
        $req->execute();
        $categories= false;
        while($result = $req->fetch()){
            $categorie = new Categorie($result);
            $categories[] = $categorie;
        }
        return $categories;
    }

    /**
     * @param $id
     * @return bool|Categorie
     */
    public function getCategorie($id){
        $req = $this->db->prepare('SELECT * FROM categorie WHERE id = :id');
        $req->bindValue(':id', $id, FILTER_SANITIZE_NUMBER_INT);
        $req->execute();
        $categorie = false;
        if($result = $req->fetch()){
            $categorie = new Categorie($result);
        }
        return $categorie;
    }

    /**
     * @param Categorie $categorie
     * @return bool
     */
    public function addCategorie($categorie){
        $req = $this->db->prepare('INSERT INTO categorie values (null, :nom,:description,:image)');
        $req->bindValue(':nom',$categorie->getNom());
        $req->bindValue(':description',$categorie->getDescription());
        $req->bindValue(':image',$categorie->getImage());
        return $req->execute();
    }

    /**
     * @param Categorie $categorie
     * @return bool
     */
    public function updateCategorie($categorie) {
        var_dump($categorie);
        $req = $this->db->prepare('UPDATE categorie SET nom = :nom,description = :description, image=:image WHERE id=:id');
        $req->bindValue(':id',$categorie->getId());
        $req->bindValue(':nom',$categorie->getNom());
        $req->bindValue(':description',$categorie->getDescription());
        $req->bindValue(':image',$categorie->getImage());
        return $req->execute();
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteCategorie($id) {
        $req = $this->db->prepare('DELETE FROM categorie WHERE id=:id');
        $req->bindValue(':id',$id);
        return $req->execute();
    }

    public function getCatProduit($idProduit){
            $req = $this->db->prepare('select idCategorie FROM categorie_produit WHERE idProduit=:id');
            $req->bindValue(':id',$idProduit);
            $req->execute();
            if($result = $req->fetch()){
                return $result['idCategorie'];
            }
            return false;

    }
}