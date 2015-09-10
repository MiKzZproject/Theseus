<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 21/03/2015
 * Time: 11:11
 */

namespace model;


class Client {

    private $id;
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $tel;
    private $email;
    private $pwd;
    private $dateInscription;
    private $newsletters;
    private $alerte;
    private $dateDebutAbo;
    private $dateFinAbo;
    private $renew;

    public function hydrate(array $array){
        foreach ($array as $cle => $valeur) {
            $method = 'set' . ucfirst($cle);
            if (method_exists($this, $method)) {
                $this->$method($valeur);
            }
        }
    }

    /**
     * @param mixed $dateInscription
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;
    }

    /**
     * @return mixed
     */
    public function getAlerte()
    {
        return $this->alerte;
    }

    /**
     * @param mixed $alert
     */
    public function setAlerte($alerte)
    {
        $this->alerte = $alerte;
    }

    /**
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param mixed $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getNewsletters()
    {
        return $this->newsletters;
    }

    /**
     * @param mixed $newsletters
     */
    public function setNewsletters($newsletters)
    {
        $this->newsletters = $newsletters;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function __construct($array){
        $this->hydrate($array);
    }

    /**
     * @return mixed
     */
    public function getDateDebutAbo()
    {
        return $this->dateDebutAbo;
    }

    /**
     * @param mixed $dateDebutAbo
     */
    public function setDateDebutAbo($dateDebutAbo)
    {
        $this->dateDebutAbo = $dateDebutAbo;
    }

    /**
     * @return mixed
     */
    public function getDateFinAbo()
    {
        return $this->dateFinAbo;
    }

    /**
     * @param mixed $dateFinAbo
     */
    public function setDateFinAbo($dateFinAbo)
    {
        $this->dateFinAbo = $dateFinAbo;
    }

    /**
     * @return mixed
     */
    public function getRenew()
    {
        return $this->renew;
    }

    /**
     * @param mixed $renew
     */
    public function setRenew($renew)
    {
        $this->renew = $renew;
    }


    /**
     * @return mixed
     */
    public function getIsPrenium()
    {
        if($this->dateFinAbo > time()) {
            return true;
        }
        return false;
    }
} 