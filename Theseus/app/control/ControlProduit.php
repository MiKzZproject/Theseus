<?php
/**
 * Created by PhpStorm.
 * User: rpid6
 * Date: 26/02/2015
 * Time: 16:43
 */

namespace control;


use model\Produit;

class ControlProduit {
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function getProduits(){
        $req = $this->bdd->prepare('SELECT * FROM produit');
        $req->execute();
        while($result = $req->fetch()){
            $produit = new Produit($result);
           $produits[] = $produit;
        }
        return $produits;
    }

    public function addProduit($produit){
        $req = $this->bdd->prepare('INSERT INTO produit values (null,:libelle,:marque,:idCategorie,:modele,:description,:prix,:stock,:image)');
        $req->bindValue(':libelle',$produit->getLibelle());
        $req->bindValue(':marque',$produit->getMarque());
        $req->bindValue(':idCategorie',$produit->getIdCategorie());
        $req->bindValue(':modele',$produit->getModele());
        $req->bindValue(':description',$produit->getDescription());
        $req->bindValue(':prix',$produit->getPrix());
        $req->bindValue(':stock',$produit->getStock());
        $req->bindValue(':image',$produit->getImage());
        return $req->execute();
    }

    public function updateProduit($produit){
        $req = $this->bdd->prepare('UPDATE produit SET  libelle = :libelle,marque=:marque, idCategorie=:idCategorie, modele=:modele,
                                                        description=:description, prix=:prix, stock=:stock, image=:image
                                                        WHERE id=:id');
        $req->bindValue(':id',$produit->getId());
        $req->bindValue(':libelle',$produit->getLibelle());
        $req->bindValue(':marque',$produit->getMarque());
        $req->bindValue(':modele',$produit->getModele());
        $req->bindValue(':idCategorie',$produit->getIdCategorie());
        $req->bindValue(':description',$produit->getDescription());
        $req->bindValue(':prix',$produit->getPrix());
        $req->bindValue(':stock',$produit->getStock());
        $req->bindValue(':image',$produit->getImage());
        return $req->execute();
    }

    public function deleteProduit($id){
        $req = $this->bdd->prepare('DELETE FROM produit WHERE id=:id');
        $req->bindValue(':id', $id);
        return $req->execute();
    }

}