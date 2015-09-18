<?php
/**
 * Created by PhpStorm.
 * User: mikzz
 * Date: 18/09/15
 * Time: 01:51
 */

namespace control;

use config\Db;
use model\Commande;

class ControlCommande {
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

    public function getCommandes(){
        $req = $this->db->prepare('SELECT * from commande_produit');
        $req->execute();
        $commandes = null;
       while ($result = $req->fetch()) {
            $commandes[] = new Commande($result);
        }
        return $commandes;
    }
}
