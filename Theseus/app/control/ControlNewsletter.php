<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17/08/2015
 * Time: 12:52
 */

namespace control;

use config\Db;
use model\Newsletter;

class ControlNewsletter {

    private $db;

    public function __construct(Db $db)
    {
        if (!$db) throw new InvalidArgumentException("First argument is expected to be a valid PDO instance, NULL given");
        $this->db = $db->getPDOInstance();
    }

    public function getNewsletters(){
        $req = $this->db->prepare('SELECT *
                                    FROM newsletter');
        $req->execute();

        while($result = $req->fetch()){
            $newsletter = new Newsletter($result);
            $newsletters[] = $newsletter;
        }
        return $newsletters;
    }

    public function addNewsletter($newsletter){
        $req = $this->db->prepare('INSERT INTO newsletter (mail)
                                    VALUES (:mail)');
        $req->bindValue(':mail',$newsletter->getMail());
        return $req->execute();
    }

    public function updateNewsletter($newsletter){
        $req = $this->db->prepare('UPDATE newsletter
                                    SET mail = :mail
                                    WHERE id = :id ');

        $req->bindValue(':id',$newsletter->getId());
        $req->bindValue(':mail',$newsletter->getMail());
        $req->execute();

    }

    public function deleteNewsletter($id){
        $req = $this->db->prepare('DELETE
                                    FROM newsletter
                                    WHERE id = :id ');

        $req->bindValue(':id',$id->getId());

        $req->execute();

    }
}
