<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 14:03
 */

namespace control;


use model\Produit;

class ControlProduit {
    /**
     * @var
     */
    private $bdd;

    /**
     * @param $bdd
     */
    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function add(Produit $produit) {
        $req = $this->bdd->prepare("INSERT INTO produit (marque,type,modele,poids,dimensions,caracteristiques,stock,prix,description)
                                   VALUES (:marque,:type,:modele,:poids,:dimensions,:caracteristiques,:stock,:prix,:description)");

        $req->bindValue(':marque', $produit->getMarque());
        $req->bindValue(':type', $produit->getType());
        $req->bindValue(':modele', $produit->getModele());
        $req->bindValue(':poids', $produit->getPoids());
        $req->bindValue(':dimensions', $produit->getDimension());
        $req->bindValue(':caracteristiques', $produit->getCaracteristiques());
        $req->bindValue(':stock', $produit->getStock());
        $req->bindValue(':prix', $produit->getPrix());
        $req->bindValue(':description', $produit->getDescription());
        if ($req->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function del($array) {

    }

    public function mod($array) {

    }
}