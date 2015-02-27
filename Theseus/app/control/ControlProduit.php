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
        $req = $this->bdd->prepare('INSERT INTO produit values (:id,:libelle,:marque,:categoryId,:description,:prix,:stock');
        $req->bindValue(':id',$produit->getId());
        $req->bindValue(':libelle',$produit->getId());
        $req->bindValue(':categoryId',$produit->getId());
        $req->bindValue(':description',$produit->getId());
        $req->bindValue(':prix',$produit->getId());
        $req->bindValue(':stock',$produit->getId());
        $req->execute();
    }


}