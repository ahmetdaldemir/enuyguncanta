<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class User extends Controller
{
    public function index()
    {
        $data["users"] = User::all();
        return view('admin.users.index', $data);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function edit(int $id)
    {
        $data['users'] = User::find($id);

        return view('admin.users.edit', $data);
    }

    public function save(Request $request)
    {
        $shipment = new User();
        $shipment->name = $request->name;
        $shipment->email = $request->email;
        $shipment->password = $request->password;
        $shipment->role = 'admin';
        $shipment->save();
        return redirect("admin/users");
    }

    public function update(Request $request)
    {
        $shipment =  User::find($request->id);
        $shipment->name = $request->name;
        $shipment->email = $request->email;
        $shipment->password = $request->password;
        $shipment->save();
        return redirect("admin/users");
    }

    public function remove(int $id)
    {
        $remove = new User();
        $remove = $remove->find($id);
        if ($remove) {
            $remove->delete();
        }
        return redirect()->back();
    }
}
