<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 11:28
 */

namespace model;


class Evenement
{

    /** @var  int */
    private $id;
    /** @var  string */
    private $libelle;
    /** @var sting */
    private $adresse;
    /** @var int */
    private $cp;
    /** @var  string */
    private $ville;
    /** @var  datetime */
    private $dateHeure;
    /** @var int */
    private $placete;

    /**
     * @param array $array
     */
    public function __construct(array $array)
    {
        foreach ($array as $cle => $valeur) {
            $method = 'set' . ucfirst($cle);
            if (method_exists($this, $method)) {
                $this->$method($valeur);
            }
        }

    }

    /**
     * @param \model\sting $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return \model\sting
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param int $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return int
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return int
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param \model\datetime $dateHeure
     */
    public function setDateHeure($dateHeure)
    {
        $this->dateHeure = $dateHeure;
    }

    /**
     * @return \model\datetime
     */
    public function getDateHeure()
    {
        return $this->dateHeure;
    }


} 