<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        return view('admin.shipments.index');
    }
}
