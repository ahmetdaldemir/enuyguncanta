<?php

namespace App\Http\Controllers;

use App\Models\ShipmentCompany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ShipmentCompanyController extends Controller
{
    public function index()
    {
        $data["shipmentscompany"] = ShipmentCompany::all();
        return view('admin.shipmentcompany.index', $data);
    }

    public function create()
    {
        return view('admin.catalog.shipment.create');
    }

    public function edit(int $id)
    {
        $data['shipmentscompany'] = ShipmentCompany::find($id);
        return view('admin.shipmentcompany.edit', $data);
    }

    public function save(Request $request)
    {
        $shipment = new ShipmentCompany();
        $shipment->name = $request->name;
        $shipment->save();
        return redirect("admin/catalog/shipment");
    }

    public function update(Request $request)
    {
        $shipment =  ShipmentCompany::find($request->id);
        $shipment->name = $request->name;
        $shipment->save();
        return redirect("admin/shipmentscompanies");
    }

    public function remove(int $id)
    {
        $remove = new ShipmentCompany();
        $remove = $remove->find($id);
        if ($remove) {
            $remove->delete();
        }
        return redirect()->back();
    }
}
