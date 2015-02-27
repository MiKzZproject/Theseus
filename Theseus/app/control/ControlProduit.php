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


}