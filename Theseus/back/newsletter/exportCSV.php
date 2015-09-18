<?php
require('../config/config.php');
require 'ExportData.php';

$controlNewsletter = new \control\ControlNewsletter($bdd);
$filename = "export_".date('Y-m-d_H-i').".csv";

// 'browser' tells the library to stream the data directly to the browser.
// other options are 'file' or 'string'
// 'test.xls' is the filename that the browser will use when attempting to
// save the download
$exporter = new ExportDataCSV('browser', $filename);
$mails = $controlNewsletter->exportMail();

$exporter->initialize(); // starts streaming data to web browser

foreach($mails as $mail) {
    $exporter->addRow(array($mail));
}

$exporter->finalize(); // writes the footer, flushes remaining data to browser.

exit(); // all done