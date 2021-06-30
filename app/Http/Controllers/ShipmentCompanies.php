<?php

namespace App\Http\Controllers;

use App\Models\ShipmentCompany;
use Illuminate\Http\Request;

class ShipmentCompanies extends Controller
{
    public function index()
    {
        $data["shipments"] = ShipmentCompany::all();
        return view('admin.catalog.shipment.index', $data);
    }

    public function create()
    {
        return view('admin.catalog.shipment.create');
    }

    public function edit(int $id)
    {
        $data['shipment'] = ShipmentCompany::find($id);

        return view('admin.catalog.shipment.edit', $data);
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
        return redirect("admin/catalog/shipment");
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
