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
    private $libelleEvent;
    private $libelleProduit;
    private $quantite;
    private $total;
    private $livrer;

    function __construct($array)
    {
        $this->hydrate($array);
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
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @param mixed $idClient
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
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

    /**
     * @return mixed
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * @param mixed $idEvent
     */
    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;
    }

    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @param mixed $idProduit
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getLibelleEvent()
    {
        return $this->libelleEvent;
    }

    /**
     * @param mixed $libelleEvent
     */
    public function setLibelleEvent($libelleEvent)
    {
        $this->libelleEvent = $libelleEvent;
    }

    /**
     * @return mixed
     */
    public function getLibelleProduit()
    {
        return $this->libelleProduit;
    }

    /**
     * @param mixed $libelleProduit
     */
    public function setLibelleProduit($libelleProduit)
    {
        $this->libelleProduit = $libelleProduit;
    }
}