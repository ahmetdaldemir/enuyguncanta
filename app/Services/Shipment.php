<?php


namespace App\Services;


use App\Contract\IShipment;
use App\Models\ShipmentCompany;
use App\Request\ShipmentServiceRequest;
use App\Models\Shipment as ShipmentModel;

class Shipment extends ShipmentServiceRequest implements IShipment
{
    protected $base_uri = "http://webpostman.kargozamani.com:9999/";
    protected $method ="POST";
    protected $path = "restapi/client/consignment/add";
    protected $labelData;

    public function __construct(ShipmentCompany $shipmentSetting,$shipmentData)
    {
        $this->payload = $shipmentData;
        $this->options['headers']['Authorization'] = "5VvspOKA4C9ZcEWmzd6S2ByqR0wM3Y8bjHFPnxTDht1N7LaU";
        $this->options['headers']['From'] = "hasret@enuyguncanta.com";
        $this->options = [
            'headers' => [
                'content-type' => 'application/x-www-form-urlencoded',
                'Authorization' => "5VvspOKA4C9ZcEWmzd6S2ByqR0wM3Y8bjHFPnxTDht1N7LaU",
                'From' => "hasret@enuyguncanta.com",
            ],
            'form_params' => [
                'customer' => $this->payload["customer"],
                'province_name' => $this->payload["province_name"],
                'county_name' => $this->payload["county_name"],
                'address' => $this->payload["address"],
                'telephone' => $this->payload["telephone"],
                'branch_code' => $this->payload["branch_code"],
                'barcode' => $this->payload["barcode"],
                'reference' => $this->payload["reference"],
                'amount' => $this->payload["amount"],
                'currency_name' => $this->payload["currency_name"],
                'amount_type_id' => $this->payload["amount_type_id"],
                'seller' => $this->payload["seller"],
            ],
        ];

        parent::__construct($shipmentSetting);
    }

    protected function onSuccess(): void
    {

      dd($this->getContent());
    }

    public function getTrackingCode(): string
{
    // TODO: Implement getTrackingCode() method.
}

    public function getBarcode(): string
    {
        // TODO: Implement getBarcode() method.
    }

    public function setTrackingCode():  ShipmentModel
    {
        // TODO: Implement getTrackingCode() method.
    }

    public function setBarcode(): ShipmentModel
    {
        // TODO: Implement getBarcode() method.
    }

    public function getContent(): string
    {
      return $this->content;
    }

    public function getStatusCode(): string
    {
        // TODO: Implement getStatusCode() method.
    }





}
