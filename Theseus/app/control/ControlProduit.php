<?php
/**
 * Created by PhpStorm.
 * User: rpid6
 * Date: 26/02/2015
 * Time: 16:43
 */

namespace control;


use config\Db;
use model\Produit;

/**
 * Class ControlProduit
 * @package control
 */
class ControlProduit {

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
    public function getProduits(){
        $req = $this->db->prepare('SELECT * FROM produit');
        $req->execute();
        $produits = false;
        while($result = $req->fetch()){
            $produit = new Produit($result);
           $produits[] = $produit;
        }
        return $produits;
    }
    public function getProduitId($id){
        $req = $this->db->prepare('SELECT * FROM produit where id = :id');
        $req->bindValue(':id', $id);
        $req->execute();
        $produits = false;
        if($result = $req->fetch()){
            $produit = new Produit($result);
            $produits = $produit;
        }
        return $produits;
    }

    public function getProduitsOpt($value,$type){
        if(empty($value)){
            $req = $this->db->prepare('SELECT * FROM produit');
        }else{
            if(!$type){
                $req = $this->db->prepare('SELECT * FROM produit where libelle like :libelle');
                $req->bindValue(':libelle', '%'.$value.'%');
            }else{
                $req = $this->db->prepare('SELECT * FROM produit where marque like :marque');
                $req->bindValue(':marque', '%'.$value.'%');
            }
        }
        $req->execute();
        $produits = false;
        while($result = $req->fetch()){
            $produit = new Produit($result);
            $produits[] = $produit;
        }
        return $produits;
    }

    /**
     * @param Produit $produit
     * @return bool
     */
    public function addProduit($produit){
        $req = $this->db->prepare('INSERT INTO produit values (null,:libelle,:marque,:modele,:description,:prix,:stock,:image, :miniature, :nbVentes)');
        $req->bindValue(':libelle',$produit->getLibelle());
        $req->bindValue(':marque',$produit->getMarque());
        $req->bindValue(':modele',$produit->getModele());
        $req->bindValue(':description',$produit->getDescription());
        $req->bindValue(':prix',$produit->getPrix());
        $req->bindValue(':stock',$produit->getStock());
        $req->bindValue(':image',$produit->getImage());
        $req->bindValue(':miniature',$produit->getMiniature());
        $req->bindValue(':nbVentes',$produit->getNbVentes());
        $req->execute();
        return $this->db->lastInsertId();

    }

    public function addLiaison($idCat,$idProduit){
        $req = $this->db->prepare('INSERT INTO categorie_produit (idCategorie, idProduit) values (:idCat,:idProduit)');
        $req->bindValue(':idCat',$idCat);
        $req->bindValue(':idProduit',$idProduit);
        return $req->execute();
    }

    /**
     * @param Produit $produit
     * @return bool
     */
    public function updateProduit($produit){
        $req = $this->db->prepare('UPDATE produit SET  libelle = :libelle,marque=:marque, modele=:modele,
                                                       description=:description, prix=:prix, stock=:stock,
                                                       image=:image, miniature=:miniature , nbVentes=:nbVentes
                                                       WHERE id=:id');
        $req->bindValue(':id',$produit->getId());
        $req->bindValue(':libelle',$produit->getLibelle());
        $req->bindValue(':marque',$produit->getMarque());
        $req->bindValue(':modele',$produit->getModele());
        $req->bindValue(':description',$produit->getDescription());
        $req->bindValue(':prix',$produit->getPrix());
        $req->bindValue(':stock',$produit->getStock());
        $req->bindValue(':image',$produit->getImage());
        $req->bindValue(':miniature',$produit->getMiniature());
        $req->bindValue(':nbVentes',$produit->getNbVentes());
        return $req->execute();
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteProduit($id){
        $req = $this->db->prepare('DELETE FROM produit WHERE id=:id');
        $req->bindValue(':id', $id);
        return $req->execute();
    }

    /**
     * @param $categorie
     * @param int $page
     * @return array|bool
     */
    public function getProduitsByCategorie($categorie, $page = 1 ){
        /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
        $limit = \config\Theseus::NBPERPAGEPRODUCT;
        $pageNb = ($page-1) * $limit;
        $produits = [];
        if(is_numeric($categorie)) {
            $sql = "SELECT * FROM categorie_produit C, produit P where C.idProduit = P.id and C.idCategorie = $categorie LIMIT ".$pageNb.",".$limit;
            $req = $this->db->prepare($sql);
            $req->execute();
            while ($result = $req->fetch()) {
                $produit = new Produit($result);
                $produits[] = $produit;
            }
            return $produits ? $produits : false;
        } else {
            return $this->getProduitsPagination($page);
        }
    }
    public function getProduitByEvent($idEvent){
        $req = $this->db->prepare('SELECT * FROM produit where id in (select idProduit from evenement_produit where idEvenement = :idEvent)');
        $req->bindValue(':idEvent', $idEvent);
        $req->execute();

        $produits = false;
        while($result = $req->fetch()){
            $produits[] = new Produit($result);
        }
        return $produits;
    }

    /**
     * @return array|bool
     */
    public function getFeaturedProducts(){
        /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
        $nbProduits = \config\Theseus::NBPERPAGEFEATURED;
        $req = $this->db->prepare("SELECT * FROM produit ORDER BY nbVentes DESC LIMIT ".$nbProduits);
        $req->execute();
        $produits = false;
        while($result = $req->fetch()){
            $produit = new Produit($result);
            $produits[] = $produit;
        }
        return $produits;
    }

    /**
     * @param null $categorie
     * @return mixed
     */
    public function getProduitsCount($categorie = null){
        if(is_numeric($categorie)) {
            $sql = "SELECT count(*) as count FROM  produit P, categorie_produit C where C.idProduit = P.id and C.idCategorie = $categorie";
        } else {
            $sql = "SELECT count(*) as count FROM produit ";
        }
        $req = $this->db->prepare($sql);
        $req->execute();
        $result = $req->fetch();
        return $result['count'];
    }

    /**
     * @param $page
     * @return array|bool
     */
    public function getProduitsPagination($page){
        /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
        $nbProduits = \config\Theseus::NBPERPAGEPRODUCT;
        $page = ($page-1) * $nbProduits;
        $sql = 'SELECT * FROM produit LIMIT '.$page.','.$nbProduits;
        $req = $this->db->prepare($sql);
        $req->execute();
        $produits = false;
        while($result = $req->fetch()){
            $produit = new Produit($result);
            $produits[] = $produit;
        }
        return $produits;
    }

    /**
     * @param string $search
     * @param null $categorie
     * @return mixed
     */
    public function getSearchProduitsCount($search, $categorie = null){
        if(is_numeric($categorie)) {
            $sql = "SELECT count(*) as count
                    FROM  produit P, categorie_produit C
                    where C.idProduit = P.id
                    and C.idCategorie = $categorie
                    and (P.libelle like '%$search%' OR marque like '%$search%')";
        } else {
            $sql = "SELECT count(*) as count
                    FROM produit
                    where libelle like '%$search%'
                    or marque like '%$search%'";
        }
        $req = $this->db->prepare($sql);
        $req->execute();
        $result = $req->fetch();
        return $result['count'];
    }

    /**
     * @param string $search
     * @param $page
     * @return array|bool
     */
    public function getSearchProduitsPagination($search, $page){
        /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
        $nbProduits = \config\Theseus::NBPERPAGEPRODUCT;
        $page = ($page-1) * $nbProduits;
        $sql = "SELECT * FROM produit
                where libelle like '%$search%'
                or marque like '%$search%'
                LIMIT ".$page.','.$nbProduits;

        $req = $this->db->prepare($sql);
        $req->execute();
        $produits = false;
        while($result = $req->fetch()){
            $produit = new Produit($result);
            $produits[] = $produit;
        }
        return $produits;
    }

    /**
     * @param string $search
     * @param int $categorie
     * @param int $page
     * @return array|bool
     */
    public function getSearchProduitsByCategorie($search, $categorie, $page = 1 ){
        /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */
        $limit = \config\Theseus::NBPERPAGEPRODUCT;
        $pageNb = ($page-1) * $limit;
        if(is_numeric($categorie)) {
            $sql = "SELECT * FROM categorie_produit C, produit P
                    where C.idProduit = P.id
                    and C.idCategorie = $categorie
                    and (P.libelle like '%$search%' OR marque like '%$search%')
                    LIMIT ".$pageNb.",".$limit;
            $req = $this->db->prepare($sql);
            $req->execute();
            $produits = false;
            while ($result = $req->fetch()) {
                $produit = new Produit($result);
                $produits[] = $produit;
            }
            return $produits;
        } else {
            return $this->getSearchProduitsPagination($search,$page);
        }
    }
}