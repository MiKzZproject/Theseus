<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 19/03/2015
 * Time: 15:09
 */

namespace Facture\models;


use Facture\Knp\Invoice\Generators\Twig;
use Facture\Knp\Invoice\Model\Entry;
use Facture\Knp\Invoice\Model\Tax;

class Facture {

    Public function getSeller() {
        $seller = new Seller();
        $seller->setName('Theseus');
        $seller->setLogo('img/logo.jpg');
        return $seller;
    }

    Public function generateHtml($data) {
        if(empty($data)) {
            return false;
        }
        $invoice = new Invoice();
        $seller = $this->getSeller();
        $invoice->setSeller($seller);
        $date = new \DateTime();
        if(empty($data['datetime']) || !$data['datetime']) {
            $data['datetime'] = time();
        }
        $date->setTimestamp($data['datetime']);
        $invoice->setDateAbo($date);
        if(!empty($data['ref_transaction'])) {
            $invoice->setRefTransaction($data['ref_transaction']);
        }

        $buyer = new Buyer();
        if(!empty($data['societe'])) {
            $buyer->setCompanyName($data['societe']);
        }
        if(!empty($data['nom'])) {
            $buyer->setLastName($data['nom']);
        }
        if(!empty($data['prenom'])) {
            $buyer->setFirstName($data['prenom']);
        }
        // Add address: street, city, zip-code, country
        $buyer->setAddress('rue herold', 'Paris', '75001', 'France');
        $invoice->setBuyer($buyer);

        $amount = $data['amount'];

        //        ACHAT
        $taxTVA = new Tax('TVA', 20);
        $entry = new Entry();
        $entry->setDescription($data['libelleProduct']);
        $entry->setUnitPrice($amount/1.20);
        $entry->setQuantity(1);
        $entry->addTax($taxTVA);
        $invoice->addEntry($entry);

        $content = new Twig();
        $content->setTheme('../app/Facture/views/invoice');
        $content->setTemplate('invoice.html.twig');
//        $content->generateAndSave($invoice);
        return $content->generate($invoice);
    }

    Public function generatePDF($data) {
        ob_start();
        $html = $this->generateHtml($data);
        $html2pdf = new \HTML2PDF('P','A4','fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->WriteHTML($html);
        if(!empty($data['nom'])) {
            $fname = "facture-".$data['nom']."-".time().".pdf";
        } else {
            $fname = "facture-".time().".pdf";
        }
        $html2pdf->Output($fname, 'I');
    }
}