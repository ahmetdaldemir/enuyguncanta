<?php
$toDay = date("Y-m-d");

$name = "archive_" . $toDay . "_XXXXX_.pdf";

$rute = "storage/pdf/" . $name;

$pdf_b64 = base64_decode($shipment->barcode);

if (file_put_contents($rute, $pdf_b64)) {
    header("Content-type: application/pdf");
    echo $pdf_b64;
}
