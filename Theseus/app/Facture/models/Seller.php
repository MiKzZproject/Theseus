<?php

namespace Facture\models;

use \Facture\Knp\Invoice\Model\Client;

class Seller extends Client
{
    protected $logotype;
    protected $account_number;
    protected $rcs_number;
    protected $tva_number;

    public function getAccountNumber()
    {
        return $this->account_number;
    }

    public function getTvaNumber()
    {
        return $this->tva_number;
    }

    public function setTvaNumber($tva_number)
    {
        $this->tva_number = $tva_number;
    }

    public function getRcsNumber()
    {
        return $this->rcs_number;
    }

    public function setRcsNumber($rcs_number)
    {
        $this->rcs_number = $rcs_number;
    }

    public function getLogo()
    {
        return $this->logotype;
    }

    public function setAccountNumber($accountNumber)
    {
        $this->account_number = $accountNumber;
    }

    public function setLogo($logotype)
    {
        if (!file_exists($logotype)) {
            throw new \InvalidArgumentException(sprintf('Logo file ("%s") not exists!', $logotype));
        }

        $this->logotype = $logotype;
    }

}
