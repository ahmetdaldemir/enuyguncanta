<?php namespace App\Contract;


interface Shipment
{

    public function getTrackingCode():string;
    public function getBarcode():string;

}
