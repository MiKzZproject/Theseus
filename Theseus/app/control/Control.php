<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 18/07/14
 * Time: 16:19
 */

namespace control;


class Control {
    /** @var   */
    private $bdd;

    public function __construct($bdd){
        $this->bdd = $bdd;
    }

    public function add($obj){
        var_dump($obj);
        $class = get_class($obj);
        $key =get_class_methods($class);
        var_dump($key);
        $req = $this->bdd->prepare("INSERT INTO $class (nom,prenom,dateNaissance,adresse,cp,ville,mail,tel,mdp)
                                   VALUES(:nom,:prenom,:dateNaissance,:adresse,:cp,:ville,:mail,:tel,:mdp)");

    }

} 