<?php namespace App\Contract;


interface IShipment
{

    public function getTrackingCode():string;
    public function getBarcode():string;
    public function getContent():string;
    public function getStatusCode():string;

}
