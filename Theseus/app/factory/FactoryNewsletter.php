<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17/08/2015
 * Time: 12:52
 */

namespace factory;

use model\Newsletter;

class FactoryNewsletter {


    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function getNewsletters(){
        $req = $this->bdd->prepare('SELECT *
                                    FROM newsletter');
        $req->execute();

        while($result = $req->fetch()){
            $newsletter = new Newsletter($result);
            $newsletters[] = $newsletter;
        }
        return $newsletters;
    }

    public function addNewsletter($newsletter){
        $req = $this->bdd->prepare('INSERT INTO newsletter (mail)
                                    VALUES (:mail)');
        $req->bindValue(':mail',$newsletter->getMail());
        return $req->execute();
    }

    public function updateNewsletter($newsletter){
        $req = $this->bdd->prepare('UPDATE newsletter
                                    SET mail = :mail
                                    WHERE id = :id ');

        $req->bindValue(':id',$newsletter->getId());
        $req->bindValue(':mail',$newsletter->getMail());
        $req->execute();

    }

    public function deleteNewsletter($id){
        $req = $this->bdd->prepare('DELETE
                                    FROM newsletter
                                    WHERE id = :id ');

        $req->bindValue(':id',$id->getId());

        $req->execute();

    }
}
