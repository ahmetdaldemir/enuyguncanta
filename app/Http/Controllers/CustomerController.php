<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    public function index()
    {
        $data['customers'] = Customer::all();
        return view('admin.customers.index',$data);
    }

    public function create(){
        return view('admin.customers.create');
    }

    public function save(Request $request){
        $save_data = new Customer();
        $save_data->type = ' ';
        $save_data->firstname = $request->firstname;
        $save_data->lastname = $request->lastname;
        $save_data->tel = $request->tel;
        $save_data->email = $request->email;
        $save_data->password = '';
        $save_data->city = $request->city;
        $save_data->state = $request->state;
        $save_data->address = $request->address;
        $save_data->tax_office = '';
        $save_data->tax_number = '';
        $save_data->tax_title = '';
        $save_data->save();

        return redirect("admin/customers");
    }

    public function edit(int $id){
        $data['customer'] = Customer::find($id);

        return view('admin.customers.edit', $data);
    }

    public function update(Request $request){
        $save_data = Customer::find($request->id);
        $save_data->type = ' ';
        $save_data->firstname = $request->firstname;
        $save_data->lastname = $request->lastname;
        $save_data->tel = $request->tel;
        $save_data->email = $request->email;
        $save_data->password = '';
        $save_data->city = $request->city;
        $save_data->state = $request->state;
        $save_data->address = $request->address;
        $save_data->tax_office = '';
        $save_data->tax_number = '';
        $save_data->tax_title = '';
        $save_data->save();

        return redirect("admin/customers");
    }

    public function remove(int $id) {
        $remove = new Customer();
        $remove = $remove->find($id);
        if ($remove) {
            $remove->delete();
        }
        return redirect()->back();
    }
}
