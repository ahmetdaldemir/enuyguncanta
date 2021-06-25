<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Services\Upload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::all();
        return view('admin.catalog.categories.index',$data);
    }

    public function create(){
        return view('admin.catalog.categories.create');
    }

    public function save(Request $request){
        $save_data = new Category();
        $save_data->name = $request->name;
        $save_data->id_parent = 0;
        $save_data->attribute = ' ';
        $save_data->save();

        return redirect("admin/catalog/categories");
    }

    public function edit(int $id){
        $data['category'] = Category::find($id);

        return view('admin.catalog.categories.edit', $data);
    }

    public function update(Request $request){
        $save_data = Category::find($request->id);
        $save_data->name = $request->name;
        $save_data->save();

        return redirect("admin/catalog/categories");
    }

    public function remove(int $id) {
        $remove = new Category();
        $remove = $remove->find($id);
        if ($remove) {
            $remove->delete();
        }
        return redirect()->back();
    }
}
