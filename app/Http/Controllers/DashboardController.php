<?php namespace App\Http\Controllers;

use App\Models\Order;
//use App\Models\OrderStatu;

class DashboardController extends Controller
{

    public function index()
    {
//        $data["orderstatus"] = OrderStatu::all();
        $data['user_id'] = Auth()->id();
        $data['orders'] = Order::orderBy("id","desc")->get();

        return view('admin.dashboard.index',$data);
    }

}
