<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\City;
use App\Models\OrderProduct;
use App\Models\OrderStatu;
use App\Models\ShipmentCompany;
use App\Models\State;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Shipment as ShipmentModel;
use App\Services\GetBarcode;
use App\Services\GetCity;
use App\Services\GetState;
use App\Services\Shipment;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    protected $order;
    protected $shipmentSettings;
    protected $city;

    public function __construct()
    {
        $this->order = new Order();
        $shipmentSetting = ShipmentCompany::find(1);
        $this->shipmentSettings = $shipmentSetting;
    }

    public function index($status_id = 1)
    {
        $data["orderstatus"] = OrderStatu::all();
        $data['user_id'] = Auth()->id();
        $data['orders'] = Order::where('status_id', $status_id)->orderBy("id", "desc")->get();

        if ($status_id == 0) {
            $data['orders'] = Order::orderBy("id", "desc")->get();
        }
        return view('admin.orders.index', $data);
    }

    public function create()
    {
        $data['customers'] = Customer::all();
        $data['category'] = Category::all();
        $data['shipmentcompanies'] = ShipmentCompany::all();

        return view('admin.orders.create', $data);
    }

    public function save(Request $request)
    {
        $customer = Customer::find($request->id);
        $amount = 0;
        $save_data = new Order();
        $save_data->customer_id = $request->customer_id;
        $save_data->user_id = Auth()->id();
        $save_data->status_id = 1;
        $save_data->amount = $amount;
        $save_data->custom_amount = $request->custom_amount;
        $save_data->description = $request->description;

        if (isset($request->fullname)) {
            $save_data->fullname = $request->fullname;
            $save_data->tel = $request->tel;
            $save_data->mail = $request->mail;
            $save_data->address = $request->address;
            $save_data->city_id = $request->city;
            $save_data->state_id = $request->state;
        }

        $save_data->save();
        $order_id = $save_data->id;

        foreach ($request->product as $product) {
            $price = Product::find($product["id"])->price1;
            $orderproduct = new OrderProduct();
            $orderproduct->product_id = $product["id"];
            $orderproduct->price = $price;
            $orderproduct->order_id = $order_id;
            $orderproduct->quantity = $product["quantity"];
            $orderproduct->save();

            Product::where("id", $product["id"])->decrement('quantity', $product["quantity"]);

            $amount += $price * $product["quantity"];
        }

        $orderupdate = Order::find($order_id);
        $orderupdate->amount = $amount;
        $orderupdate->save();
        return redirect("admin/orders/index/1");
    }

    public function edit(int $id)
    {
        $products = new OrderProduct();
        $data['products'] = $products->where('order_id', $id)->get();
        $data['user'] = Auth()->id();
        $data['category'] = Category::all();
        $data['order'] = Order::find($id);
        return view('admin.orders.edit', $data);
    }

    public function update(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $amount = 0;
        $save_data = new Order($request->id);
        $save_data->customer_id = $request->customer_id;
        $save_data->user_id = Auth()->id();
        $save_data->status_id = 1;
        $save_data->amount = $amount;
        $save_data->custom_amount = $request->custom_amount;
        $save_data->description = $request->description;

        if (isset($request->fullname)) {
            $save_data->fullname = $request->fullname;
            $save_data->tel = $request->tel;
            $save_data->mail = $request->mail;
            $save_data->address = $request->address;
            $save_data->city_id = $request->city;
            $save_data->state_id = $request->state;
        }

        $save_data->save();
        $order_id = $save_data->id;

        OrderProduct::where('order_id', $request->id)->delete();

        foreach ($request->product as $product) {
            $price = Product::find($product["id"])->price1;
            $orderproduct = new OrderProduct();
            $orderproduct->product_id = $product["id"];
            $orderproduct->price = $price;
            $orderproduct->order_id = $order_id;
            $orderproduct->quantity = $product["quantity"];
            $orderproduct->save();

            Product::where("id", $product["id"])->decrement('quantity', $product["quantity"]);

            $amount += $price * $product["quantity"];
        }

        $orderupdate = Order::find($order_id);
        $orderupdate->amount = $amount;
        $orderupdate->save();
        return redirect("admin/orders");
    }

    public function remove(int $id)
    {
        $remove = new Product();
        $remove = $remove->find($id);
        if ($remove) {
            $remove->delete();
        }
        return redirect()->back();
    }

    public function view(Request $request)
    {
        $data['product'] = Product::find($request->id);
        $data['category'] = Category::all();
        $data['order'] = Order::find($request->id);
        return view('admin.orders.view', $data);
    }

    public function export()
    {
        return Excel::download(new OrderExport, 'orders.xlsx');
    }

    public function orderstatus(int $id, int $status_id)
    {
        $order = Order::find($id);
        $order->status_id = $status_id;
        $order->save();
        return redirect()->back();
    }

    public function shipment(int $id, int $status_id)
    {
        if ($status_id == 2) {
            $order = Order::find($id);
            $collectData = $this->collectData($order);
            $shipment = new Shipment($this->shipmentSettings, $collectData);
            $content = json_decode($shipment->getContent(), TRUE);
            $order->status_id = $status_id;
            $order->shipment_code = $content['barcode'];
            $order->save();


            $shipmentnew = new ShipmentModel();
            $shipmentnew->barcode =   $content['barcode']; // $this->getBarcode( $content['barcode']);
            $shipmentnew->shipping_code = $content['barcode'];
            $shipmentnew->save();
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
        dd($x);
    }


}
