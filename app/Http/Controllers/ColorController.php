<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $data['colors'] = Color::all();
        return view('admin.catalog.color.index',$data);
    }

    public function create(){
        return view('admin.catalog.color.create');
    }

    public function save(Request $request){
        $save_data = new Color();
        $save_data->name = $request->name;
        $save_data->save();

        return redirect("admin/catalog/color");
    }

    public function edit(int $id){
        $data['colors'] = Color::find($id);

        return view('admin.catalog.color.edit', $data);
    }

    public function update(Request $request){
        $save_data = Color::find($request->id);
        $save_data->name = $request->name;
        $save_data->save();

        return redirect("admin/catalog/color");
    }

    public function remove(int $id) {
        $remove = new Color();
        $remove = $remove->find($id);
        if ($remove) {
            $remove->delete();
        }
        return redirect()->back();
    }
}
