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
    private $id_client;
    private $date_commande;
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
        return $this->id_client;
    }

    /**
     * @param mixed $id_client
     */
    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
    }

    /**
     * @return mixed
     */
    public function getDateCommande()
    {
        return $this->date_commande;
    }

    /**
     * @param mixed $date_commande
     */
    public function setDateCommande($date_commande)
    {
        $this->date_commande = $date_commande;
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