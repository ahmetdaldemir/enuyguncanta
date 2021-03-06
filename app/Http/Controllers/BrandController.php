<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Services\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function __construct(){
    }

    public function __invoke(){
    }

    public function index()
    {
        $data['brands'] = Brand::all();
        return view('admin.catalog.brands.index',$data);
    }

    public function create(){
        return view('admin.catalog.brands.create');
    }

    public function save(Request $request){
        $save_data = new Brand();
        $save_data->name = $request->name;
        $save_data->image = $request->image;
        $save_data->save();
//        $service = new Upload($request,$this->module_name);
//        $service->getImage();

        return redirect("admin/catalog/brands");
    }

    public function edit(int $id){
        $data['brand'] = Brand::find($id);

        return view('admin.catalog.brands.edit', $data);
    }

    public function update(Request $request){
        $save_data = Brand::find($request->id);
        $save_data->name = $request->name;
        $save_data->image = $request->image;
        $save_data->save();

        return redirect("admin/catalog/brands");
    }

    public function remove(int $id) {
        $remove = new Brand;
        $remove = $remove->find($id);
        if ($remove) {
            $remove->delete();
        }
        return redirect()->back();
    }

    public function images(int $id){

        $data['images'] = array();
        $data['tour_name'] = TourLanguages::where(['tour_id'=>$id,'language_id'=>1])->first();
        return view('manager.tours.images', $data);
    }
    public function imagessave(Request $request){

        $service = new Upload($request,$this->module_name);
        $service->getImage();
        return redirect()->back();

    }

}
