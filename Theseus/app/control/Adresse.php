<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 30/01/2015
 * Time: 14:37
 */

namespace model;


class Adresse {
    private $id;
    private $rue;
    private $cp;
    private $ville;

    public function __construct($array){
        setId($array['id']);
        setRue($array['rue']);
        setCp($array['cp']);
        setVille($array['ville']);
    }

    public function hydrate(array $donnees)
    {
        if (isset($donnees['id']))
        {
            $this->setId($donnees['id']);
        }
        if (isset($donnees['rue'])) {
            $this->setNom($donnees['rue']);
        }
        if (isset($donnees['cp'])) {
            $this->setNom($donnees['rue']);
        }
        if (isset($donnees['ville'])) {
            $this->setNom($donnees['rue']);
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
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }




}