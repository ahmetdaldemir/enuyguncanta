<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\City;
use App\Models\OrderProduct;
use App\Models\OrderStatu;
use App\Models\State;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    protected $order;

    public function __construct()
    {
        $this->order = new Order();
    }

    public function index()
    {
        $data["orderstatus"] = OrderStatu::all();
        $data['user_id'] = Auth()->id();
        $data['orders'] = Order::orderBy("id","desc")->get();

        return view('admin.orders.index', $data);
    }

    public function create()
    {
        $data['customers'] = Customer::all();
        $data['category'] = Category::all();

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
        if(isset($request->fullname))
        {
            $save_data->fullname =   $request->fullname;
            $save_data->tel =        $request->tel;
            $save_data->mail =       $request->mail;
            $save_data->address =    $request->address;
            $save_data->city_id =    $request->city;
            $save_data->state_id  =  $request->state;
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

            $amount += $price * $product["quantity"];
        }

        $orderupdate = Order::find($order_id);
        $orderupdate->amount = $amount;
        $orderupdate->save();
        return redirect("admin/orders");
    }

    public function edit(int $id)
    {
        $products = new OrderProduct();
        $data['products'] = $products->where('order_id',$id)->get();
        var_dump($data['products']);
        $data['user'] = Auth()->id();
        $data['category'] = Category::all();

        return view('admin.orders.edit', $data);
    }

    public function update(Request $request)
    {
        $save_data = Product::find($request->id);
        $save_data->image = ' ';
        $save_data->category_id = $request->category_id;
        $save_data->brand_id = $request->brand_id;
        $save_data->name = $request->name;
        $save_data->stock_code = $request->stock_code;
        $save_data->barcode = $request->barcode;
        $save_data->price1 = $request->price1;
        $save_data->quantity = $request->quantity;
        $save_data->description = '';
        $save_data->save();

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
        $data['orderProduct'] = OrderProduct::where("product_id",$request->id)->get();
        return view('admin.orders.view', $data);
    }

    public function export()
    {
        return Excel::download(new OrderExport, 'orders.xlsx');
    }
}
