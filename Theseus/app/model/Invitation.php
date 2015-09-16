<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 16/09/2015
 * Time: 14:40
 */

namespace model;

class Invitation
{
    private $dateDebut;
    private $dateFin;
    private $libelleEvent;

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
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
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
}