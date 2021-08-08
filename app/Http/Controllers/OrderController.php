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
        $data['shipmentcompanies'] = ShipmentCompany::all();

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


}
