<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Order;
use App\Models\Shipment;
use App\Models\Shipment as ShipmentModel;
use App\Models\State;
use App\Services\GetBarcode;
use App\Services\GetCity;
use App\Services\GetState;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        return view('admin.shipments.index');
    }
    public function barcode($id)
    {
        $data['shipment'] = Shipment::where('order_id',$id)->first();
        return view('admin.shipments.barcode',$data);
    }



    public function create(int $id, int $status_id)
    {
        if ($status_id == 2) {
            $order = Order::find($id);
            $collectData = $this->collectData($order);
            $shipment = new \App\Services\Shipment($this->shipmentSettings, $collectData);
            $content = json_decode($shipment->getContent(), TRUE);


            $order->status_id = $status_id;
            $order->shipment_code = $content['barcode'];
            $order->save();

            $shipmentnew = ShipmentModel::updateOrCreate(
                ['order_id' =>  $id],
                ['order_id' =>  $id,'barcode' => $this->getBarcode( $content['barcode']),'shipping_code' => $content['barcode']]
            );

        }
        return redirect()->back();
    }

    public function collectData(Order $order)
    {
        $labelData["customer"] = $order->customer->firstname . " " . $order->customer->lastname;
        $labelData["customer_code"] = "";
        $labelData["province_name"] = mb_strtoupper(City::find($order->customer->city)->name);
        $labelData["county_name"] = mb_strtoupper(State::find($order->customer->state)->name);
        $labelData["address"] = $order->customer->address;
        $labelData["tax_number"] = "";
        $labelData["tax_office"] = "";
        $labelData["telephone"] = "";
        $labelData["branch_code"] = "PTT";
        $labelData["start_branch"] = "";
        $labelData["region_code"] = "";
        $labelData["courrier_code"] = "";
        $labelData["barcode"] = "";
        $labelData["sub_barcode"] = "";
        $labelData["reference"] = "";
        $labelData["amount"] = "";
        $labelData["currency_name"] = "";
        $labelData["summary"] = "";
        $labelData["quantity"] = "1";
        $labelData["weight"] = "";
        $labelData["consignment_type_id"] = "1";
        $labelData["amount_type_id"] = "3";
        $labelData["add_service_type_id"] = "";
        $labelData["distribution_type_id"] = "";
        $labelData["tax_rate"] = "";
        $labelData["order_number"] = "ENY" . $order->id;
        $labelData["output_number"] = "";
        $labelData["seller"] = "ENUYGUN";
        $labelData["invoice_serial"] = "";
        $labelData["invoice_number"] = "";
        $labelData["total_weight"] = "";
        $labelData["total_bulk"] = "";
        $labelData["bulk_weight"] = "";
        $labelData["bulk_width"] = "";
        $labelData["bulk_height"] = "";
        $labelData["bulk_length"] = "";
        $labelData["bulk_value"] = "";
        $labelData["transportation_fee"] = "";
        $labelData["goods_value"] = "";
        return $labelData;
    }

    public function getCity($cityName)
    {

        $c = new GetCity($this->shipmentSettings);
        $x = json_decode($c->getContent(), TRUE);
        $citys = $x['result'];
        foreach ($citys as $key => $value) {
            if ($value == mb_strtoupper($cityName, "UTF-8")) {
                $this->city = $key;
            }
        }
    }

    public function getState($stateName)
    {
        $c = new GetState($this->shipmentSettings, $this->city);
        $x = json_decode($c->getContent(), TRUE);
        $states = $x['result'];
        foreach ($states as $key => $value) {
            if ($value == mb_strtoupper($stateName, "UTF-8")) {
                $this->city = $key;
            }
        }
    }

    public function getBarcode($shipmentCode)
    {
        $c = new GetBarcode($this->shipmentSettings,$shipmentCode);
        $x = json_decode($c->getContent(), TRUE);
        return $x['return'][0]['barcode'];
    }

}
