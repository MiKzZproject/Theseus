<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30/01/2015
 * Time: 15:00
 */

namespace model;


class Admin {

    private $id;
    private $login;
    private $mdp;
    private $niveau;


    function __construct($id, $login, $mdp, $niveau)
    {
        $this->id = $id;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->niveau = $niveau;
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
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }


    

}