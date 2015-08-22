<?php
/**
 * Created by PhpStorm.
 * User: rpid6
 * Date: 26/02/2015
 * Time: 14:37
 */

namespace control;

use config\Db;
use model\Admin;

class ControlAdmin {

    private $db;

    public function __construct(Db $db)
    {
        if (!$db) throw new InvalidArgumentException("First argument is expected to be a valid PDO instance, NULL given");
        $this->db = $db->getPDOInstance();
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

    public function addAdmin($admin){
        $req = $this->db->prepare('INSERT INTO admin (login,pass,email,niveau) values (:login,:pass,:email,:niveau)');
        $req->bindValue(':login',$admin->getLogin());
        $req->bindValue(':pass',$admin->getPass());
        $req->bindValue(':email',$admin->getEmail());
        $req->bindValue(':niveau',$admin->getNiveau());

        $req->execute();
    }
    public function deleteAdmin($id){
        $req = $this->db->prepare('DELETE FROM admin WHERE id = :id');
        $req->bindValue(':id',$id);
        $req->execute();
    }


}