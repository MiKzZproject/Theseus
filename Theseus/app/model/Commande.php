<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 30/01/2015
 * Time: 14:39
 */
namespace model;

class Commande {
    private $id;
    private $dateCommande;
    private $livrer;

    function __construct($livrer, $id, $dateCommande)
    {
        $this->livrer = $livrer;
        $this->id = $id;
        $this->dateCommande = $dateCommande;
    }



    public function hydrate(array $array){
        foreach ($array as $cle => $valeur) {
            $method = 'set' . ucfirst($cle);
            if (method_exists($this, $method)) {
                $this->$method($valeur);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * @param mixed $dateCommande
     */
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;
    }

    /**
     * @return mixed
     */
    public function getLivrer()
    {
        return $this->livrer;
    }

    /**
     * @param mixed $livrer
     */
    public function setLivrer($livrer)
    {
        $this->livrer = $livrer;
    }


}