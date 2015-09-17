<?php
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 02/05/2015
 * Time: 23:48
 */

namespace Facture\models;

class Buyer extends Client {

    protected $firstName;
    protected $lastName;

    protected $companyName;
    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $company_name
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }


} 