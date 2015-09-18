<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17/08/2015
 * Time: 12:52
 */

namespace control;

use config\Db;
use model\Client;
use model\Newsletter;

/**
 * Class ControlNewsletter
 * @package control
 */
class ControlNewsletter {
    /** @var \PDO */
    private $db;

    /**
     * @param Db $db
     */
    public function __construct(Db $db)
    {
        if (!$db) throw new \InvalidArgumentException("First argument is expected to be a valid PDO instance, NULL given");
        $this->db = $db->getPDOInstance();
    }

    /**
     * @return array|bool
     */
    public function getNewsletters(){
        $req = $this->db->prepare('SELECT *
                                    FROM newsletter');
        $req->execute();
        $newsletters = false;
        while($result = $req->fetch()){
            $newsletter = new Newsletter($result);
            $newsletters[] = $newsletter;
        }
        return $newsletters;
    }

    /**
     * @return array|bool
     */
    public function exportMail(){
        $req = $this->db->prepare('SELECT mail FROM newsletter');
        $req->execute();
        $newsletters = false;
        while($result = $req->fetch()){
            $newsletters[] = $result['mail'];
        }
        return $newsletters;
    }

    /**
     * @param $email
     * @return bool|Newsletter
     */
    public function getNewslettersByEmail($email){
        $req = $this->db->prepare('SELECT *
                                    FROM newsletter
                                    WHERE mail = :mail ');

        $req->bindValue(':mail',$email);
        $req->execute();
        $newsletter = false;
        while($result = $req->fetch()){
            $newsletter = new Client($result);
        }
        return $newsletter;
    }

    /**
     * @param Newsletter $newsletter
     * @return bool
     */
    public function addNewsletter($newsletter){
        $req = $this->db->prepare('INSERT INTO newsletter (mail)
                                    VALUES (:mail)');
        $req->bindValue(':mail',$newsletter->getMail());
        return $req->execute();
    }

    /**
     * @param Newsletter $newsletter
     */
    public function updateNewsletter(Newsletter $newsletter){
        $req = $this->db->prepare('UPDATE newsletter
                                    SET mail = :mail
                                    WHERE id = :id ');

        $req->bindValue(':id',$newsletter->getId());
        $req->bindValue(':mail',$newsletter->getMail());
        $req->execute();

    }


    /**
     * @param $id
     */
    public function deleteNewsletterById($id){
        $req = $this->db->prepare('DELETE
                                    FROM newsletter
                                    WHERE id = :id ');

        $req->bindValue(':id',$id);

        $req->execute();

    }

    /**
     * @param $email
     */
    public function deleteNewsletterByEmail($email){
        $req = $this->db->prepare('DELETE
                                    FROM newsletter
                                    WHERE mail = :mail ');

        $req->bindValue(':mail',$email);

        $req->execute();

    }
}
