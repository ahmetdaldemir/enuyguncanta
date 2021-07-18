<?php namespace App\Services;

use App\Models\ShipmentCompany;
use App\Request\ShipmentServiceRequest;

class GetState extends ShipmentServiceRequest
{
    protected $base_uri = "http://webpostman.kargozamani.com:9999/";
    protected $options;
    protected $method = "GET";

    public function __construct(ShipmentCompany $shipmentSetting,int $city)
    {
        $this->path =  "restapi/client/county/".$city."?popup=1";;
        $this->options['body'] = "";
        parent::__construct($shipmentSetting);
    }

}
