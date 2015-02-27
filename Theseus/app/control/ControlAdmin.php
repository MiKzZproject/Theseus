<?php
/**
 * Created by PhpStorm.
 * User: rpid6
 * Date: 26/02/2015
 * Time: 14:37
 */

namespace control;

use model\Admin;

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
    public function getAdmin($array){
        $req = $this->db->prepare('SELECT * FROM admin WHERE login = :login AND pass = :pass');
        $req->bindValue(':login', $array['login']);
        $req->bindValue(':pass', $array['pass']);
        $req->execute();

        if($result = $req->fetch()){
            $admin = new Admin($result);
        }
        return $admin;
    }
    public function getAdmins(){
        $req = $this->db->prepare('SELECT * FROM admin');
        $req->execute();

        while($result = $req->fetch()){
            $admin = new Admin($result);
            $admins[] = $admin;
        }
        return $admins;
    }


}