<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 31/03/2015
 * Time: 17:20
 */

namespace Facture\models;


use Facture\Knp\Invoice\Model\Client;
use Facture\Knp\Invoice\Model\Coupon;
use Facture\Knp\Invoice\Model\Entry;

class Invoice extends \Facture\Knp\Invoice\Model\Invoice {
    /**
     * @var mixed
     */
    protected $refTransaction;

    /**
     * @var Seller
     */
    protected $seller;

    /**
     * @var Buyer
     */
    protected $buyer;

    /**
     * @var Coupon
     */
    protected $coupon;

    /**
     * @var float
     */
    protected $paidAmount;

    /**
     * @var Entry[]
     */
    protected $entries;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $dateAbo;

    /**
     * @var \DateTime
     */
    protected $issueDate;

    /**
     * Additional information. You could store any additional information there.
     *
     * @var array
     */
    protected $informations;

    public function __construct()
    {
        $this->entries   = array();
        $this->createdAt = new \DateTime('NOW');
        $this->informations = array();
    }

    public function getSeller()
    {
        return $this->seller;
    }

    public function getSellerName()
    {
        return $this->seller ? $this->seller->getName() : null;
    }

    public function getBuyer()
    {
        return $this->buyer;
    }

    public function getBuyerName()
    {
        return $this->buyer->getName();
    }

    public function getEntries()
    {
        return $this->entries;
    }

    public function getCoupon()
    {
        return $this->coupon;
    }

    public function getPaid()
    {
        return $this->paidAmount;
    }

    public function getTotal()
    {
        $netto  = 0;
        $brutto = 0;
        $taxes  = array();
        foreach ($this->entries as $entry) {
            $netto  += $entry->getTotalPrice();
            $brutto += $entry->getTotalPriceWithTax();

            foreach ($entry->getTax() as $tax) {
                $taxes[$tax->getName()] = $tax->getValue();
            }
        }

        return array(
            'netto'  => $netto,
            'brutto' => $brutto,
            'amount' => $brutto - ($this->coupon ? $this->coupon->getValue() : 0) - $this->paidAmount,
            'taxes'  => $taxes
        );
    }

    /**
     * @return mixed
     */
    public function getRefTransaction()
    {
        return $this->refTransaction;
    }

    /**
     * @return \DateTime
     */
    public function getDateAbo()
    {
        return $this->dateAbo;
    }

    /**
     * @param \DateTime $dateAbo
     */
    public function setDateAbo($dateAbo)
    {
        $this->dateAbo = $dateAbo;
    }

    public function getFirstName(){
        return $this->buyer->getFirstName();
    }
    /**
     * @param mixed $refTransaction
     */
    public function setRefTransaction($refTransaction)
    {
        $this->refTransaction = $refTransaction;
    }

    public function setCreatedAt(\DateTime $date)
    {
        $this->createdAt = $date;
    }

    public function setIssueDate(\DateTime $date)
    {
        $this->issueDate = $date;
    }

    public function setPaidAmount($paid)
    {
        $this->paidAmount = $paid;
    }

    public function setSeller(Client $seller)
    {
        $this->seller = $seller;
    }

    public function setBuyer(Client $buyer)
    {
        $this->buyer = $buyer;
    }

    public function setCoupon(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    public function addEntry(Entry $entry)
    {
        $this->entries[] = $entry;
    }

    public function getInformations()
    {
        return $this->informations;
    }

    public function setInformations(array $informations)
    {
        $this->informations = $informations;
    }

    public function addInformation($data)
    {
        $this->informations[] = $data;
    }

    public function clearInformations()
    {
        $this->informations = array();
    }

}