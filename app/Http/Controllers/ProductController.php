<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::all();
        return view('admin.products.index',$data);
    }

    public function create(){
        $data['brands'] = Brand::all();
        $data['category'] = Category::all();

        return view('admin.products.create', $data);
    }

    public function save(Request $request){
        $save_data = new Product();
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

        return redirect("admin/products");
    }

    public function edit(int $id){
        $data['product'] = Product::find($id);
        $data['brands'] = Brand::all();
        $data['category'] = Category::all();

        return view('admin.products.edit', $data);
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

        return redirect("admin/products");
    }

    public function remove(int $id) {
        $remove = new Product();
        $remove = $remove->find($id);
        if ($remove) {
            $remove->delete();
        }
        return redirect()->back();
    }
}
