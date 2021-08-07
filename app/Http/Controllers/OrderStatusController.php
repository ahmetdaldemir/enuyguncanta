<?php
namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\OrderStatu;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    protected $order;

    public function __construct()
    {
        $this->order = new Order();
    }

    public function index()
    {
        $data["orderstatus"] = OrderStatu::all();
        return view('admin.catalog.orderstatus.index', $data);
    }

    public function create()
    {
        return view('admin.catalog.orderstatus.create');
    }

    public function edit(int $id)
    {
        $data['orderstatus'] = OrderStatu::find($id);

        return view('admin.catalog.orderstatus.edit', $data);
    }

    public function save(Request $request)
    {
        $orderstatus = new OrderStatu();
        $orderstatus->title = $request->title;
        $orderstatus->color = $request->color;
        $orderstatus->save();
        return redirect("admin/catalog/orderstatus");
    }

    public function update(Request $request)
    {
        $orderstatus =  OrderStatu::find($request->id);
        $orderstatus->title = $request->title;
        $orderstatus->color = $request->color;
        $orderstatus->save();
        return redirect("admin/catalog/orderstatus");
    }

    public function remove(int $id)
    {
        $remove = new OrderStatu();
        $remove = $remove->find($id);
        if ($remove) {
            $remove->delete();
        }
        return redirect()->back();
    }
}

