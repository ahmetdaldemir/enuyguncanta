<?php namespace App\Services;

use App\Models\ShipmentCompany;
use App\Request\ShipmentServiceRequest;

class GetCity extends ShipmentServiceRequest
{
    protected $base_uri = "http://webpostman.kargozamani.com:9999/";
    protected $path = "restapi/client/province?popup=1";
    protected $options;
    protected $method = "GET";

    public function __construct(ShipmentCompany $shipmentSetting)
    {
        $this->options['body'] = "";
        parent::__construct($shipmentSetting);
    }

}
