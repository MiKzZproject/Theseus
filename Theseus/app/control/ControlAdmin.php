<?php
/**
 * Created by PhpStorm.
 * User: rpid6
 * Date: 26/02/2015
 * Time: 14:37
 */

namespace control;

class ControlAdmin {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function connection($array){
        $req = $this->db->prepare('SELECT count(*) FROM admin WHERE login = :login AND pass = :pass');
        $req->bindValue(':login', $array['login']);
        $req->bindValue(':pass', $array['pass']);
        $req->execute();

        if($req->fetchColumn()){
            return true;
        }
        else{
            return false;
        }

    }


}