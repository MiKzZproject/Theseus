<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 30/01/2015
 * Time: 15:01
 */

namespace model;


class Evenement {

    private $id;
    private $id_adresse;
    private $libelle;
    private $date_heure;
    private $place;

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
    public function getIdAdresse()
    {
        return $this->id_adresse;
    }

    /**
     * @param mixed $id_adresse
     */
    public function setIdAdresse($id_adresse)
    {
        $this->id_adresse = $id_adresse;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getDateHeure()
    {
        return $this->date_heure;
    }

    /**
     * @param mixed $date_heure
     */
    public function setDateHeure($date_heure)
    {
        $this->date_heure = $date_heure;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

}