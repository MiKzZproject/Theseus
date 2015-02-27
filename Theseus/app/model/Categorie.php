<?php
/**
 * Created by PhpStorm.
 * User: rpid6
 * Date: 27/02/2015
 * Time: 11:52
 */


namespace model;


class Categorie {

    private $id;
    private $nom;
    private $image;
    private $description;

    public function __construct($array){
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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}