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

class ControlProduit {

    private $db;

    public function __construct(Db $db)
    {
        if (!$db) throw new InvalidArgumentException("First argument is expected to be a valid PDO instance, NULL given");
        $this->db = $db->getPDOInstance();
    }

    public function getProduits(){
        $req = $this->db->prepare('SELECT * FROM produit');
        $req->execute();
        while($result = $req->fetch()){
            $produit = new Produit($result);
           $produits[] = $produit;
        }
        return $produits;
    }

    public function addProduit($produit){
        $req = $this->db->prepare('INSERT INTO produit values (null,:libelle,:marque,:modele,:description,:prix,:stock,:image, :miniature)');
        $req->bindValue(':libelle',$produit->getLibelle());
        $req->bindValue(':marque',$produit->getMarque());
        $req->bindValue(':modele',$produit->getModele());
        $req->bindValue(':description',$produit->getDescription());
        $req->bindValue(':prix',$produit->getPrix());
        $req->bindValue(':stock',$produit->getStock());
        $req->bindValue(':image',$produit->getImage());
        $req->bindValue(':miniature',$produit->getMiniature());
        return $req->execute();
    }

    public function updateProduit($produit){
        $req = $this->db->prepare('UPDATE produit SET  libelle = :libelle,marque=:marque, modele=:modele,
                                                        description=:description, prix=:prix, stock=:stock, image=:image, miniature=:miniature
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
        return $req->execute();
    }

    public function deleteProduit($id){
        $req = $this->db->prepare('DELETE FROM produit WHERE id=:id');
        $req->bindValue(':id', $id);
        return $req->execute();
    }

    public function getProduitsByCategorie($categorie, $page = 1 ){
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
            return $this->getProduitsPagination($page, $limit);
        }
    }

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

    public function getFeaturedProducts(){
        $nbProduits = \config\Theseus::NBPERPAGEFEATURED;
        $req = $this->db->prepare("SELECT * FROM produit ORDER BY RAND() LIMIT ".$nbProduits);
        $req->execute();
        while($result = $req->fetch()){
            $produit = new Produit($result);
            $produits[] = $produit;
        }
        return $produits;
    }

    public function getProduitsPagination($page){
        $nbProduits = \config\Theseus::NBPERPAGEPRODUCT;
        $page = ($page-1) * $nbProduits;
        $sql = 'SELECT * FROM produit LIMIT '.$page.','.$nbProduits;
        $req = $this->db->prepare($sql);
        $req->execute();
        while($result = $req->fetch()){
            $produit = new Produit($result);
            $produits[] = $produit;
        }
        return !empty($produits) ? $produits : false;
    }
}