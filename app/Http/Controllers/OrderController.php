<?php

namespace App\Http\Controllers;

use App\Models\OrderStatu;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
//        $data['users'] = User::all();
        $data['user_id'] = Auth()->id();
        $data['orders'] = Order::all();
//        $data['orders'] = Product::all();
        return view('admin.orders.index',$data);
    }

    public function create(){
        $data['customers'] = Customer::all();
        $data['category'] = Category::all();

        return view('admin.orders.create', $data);
    }

    public function save(Request $request){
        $save_data = new Order();
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

    public function edit(int $id){
        $data['product'] = Product::find($id);
        $data['user'] = Auth()->id();
        $data['category'] = Category::all();

        return view('admin.orders.edit', $data);
    }

    public function update(Request $request){
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

    public function remove(int $id) {
        $remove = new Product();
        $remove = $remove->find($id);
        if ($remove) {
            $remove->delete();
        }
        return redirect()->back();
    }
    public function view(Request $request){
        $data['product'] = Product::find($id);
        $data['category'] = Category::all();

        return view('admin.orders.view', $data);
    }
}
