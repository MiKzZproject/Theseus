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

    public function getProduitsByCategorie($categorie){
        $produits = [];
        if(is_numeric($categorie)) {
            $req = $this->db->prepare("SELECT * FROM categorie_produit C, produit P where C.idProduit = P.id and C.idCategorie = $categorie");
            $req->execute();
            while ($result = $req->fetch()) {
                $produit = new Produit($result);
                $produits[] = $produit;
            }
            return $produits ? $produits : false;
        } else {
            return $this->getProduits();
        }
    }

    public function getProduitsByCategorieCount($categorie){
        if(is_numeric($categorie)) {
            $req = $this->db->prepare("SELECT count(*) as count FROM categorie_produit C, produit P where C.idProduit = P.id and C.idCategorie = $categorie");
            $req->execute();
            $result = $req->fetch();
            return $result['count'];
        }
        return false;
    }

    public function getProduitsCount(){
        $req = $this->db->prepare("SELECT count(*) as count FROM produit ");
        $req->execute();
        $result = $req->fetch();
        return $result['count'];
    }

    public function getFeaturedProducts(){
        $req = $this->db->prepare("SELECT * FROM produit ORDER BY RAND() LIMIT 9");
        $req->execute();
        while($result = $req->fetch()){
            $produit = new Produit($result);
            $produits[] = $produit;
        }
        return $produits;
    }
}