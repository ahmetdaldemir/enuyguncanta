<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Tour;
use App\Models\TourLanguages;
use App\Models\TourTypes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use \DB;
use App\Services\Upload;

class TourController extends Controller
{
    protected $languages;
    protected $tourmodel;
    public string $module_name;

    public function __construct()
    {
        $this->tourmodel = new Tour;
        $this->languages = Language::all();
        $this->module_name = "Tour";
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }

    public function index(){
        $data['tours'] = DB::table("tours")
            ->join('tour_languages', 'tours.id', '=', 'tour_languages.tour_id')
            ->join('tour_type_languages', 'tours.tour_type_id', '=', 'tour_type_languages.tour_type_id')
            ->where('tour_type_languages.language_id','1')
            ->where('tour_languages.language_id','1')
            ->get(['tour_type_languages.*', 'tours.*', 'tours.id as tid', 'tour_languages.*']);

        return view('manager.tours.index', $data);
    }

    public function create(){
        $data['languages'] = Language::all();

        $tourtype =  $this->tourmodel->type();
        $data['tourtypes'] = $tourtype;
        return view('manager.tours.create', $data);
    }

    public function save(Request $request){
        $this->validate($request, [
            'day_count' => 'required'
        ]);
        $save_data = new Tour();
        $save_data->tour_type_id = $request->tour_type_id;
        $save_data->day_count = $request->day_count;
        $save_data->start_date = $request->start_date;
        $save_data->end_date = $request->end_date;
        $save_data->days = json_encode($request->days);
        $save_data->manager_id = 1;
        $save_data->save();
        $lastID = $save_data->id;

        foreach ($request->lang as $key => $value){
            $save_lang = new TourLanguages();
            $save_lang->tour_id = $lastID;
            $save_lang->language_id = $key;
            $save_lang->title = $value['title'];
            $save_lang->meta_title = $value['meta_title'];
            $save_lang->meta_description = $value['meta_description'];
            $save_lang->description = $value['description'] ?? "Default";
            $save_lang->services_included = $value['services_included'];
            $save_lang->services_except = $value['services_except'];
            $save_lang->url = Str::slug($value['title']);
            $save_lang->save();
        }

        return redirect("manager/tours");
    }

    public function edit(int $id){
        $data['languages'] = Language::all();
        $data['tour'] = Tour::find($id);
        $days = $data['tour'];
        $tourLanguages = TourLanguages::where("tour_id",$id)->get();
        $data['tourtypes'] = $this->tourmodel->type();
        $data['days'] = json_decode($days->days);

        foreach ($tourLanguages as $tourLang) {
            $data['tourLanguage'][$tourLang->language_id] = array(
                'title' => $tourLang->title,
                'meta_title' => $tourLang->meta_title,
                'meta_description' => $tourLang->meta_description,
                'description' => $tourLang->description,
                'services_included' => $tourLang->services_included,
                'services_except' => $tourLang->services_except
            );
        }

        return view('manager.tours.edit', $data);
    }

    public function update(Request $request){
        $this->validate($request, [
            'day_count' => 'required'
        ]);
        $save_data = new Tour();
        $save_data->tour_type_id = $request->tour_type_id;
        $save_data->day_count = $request->day_count;
        $save_data->start_date = $request->start_date;
        $save_data->end_date = $request->end_date;
        $save_data->days = json_encode($request->days);
        $save_data->manager_id = 1;
        $save_data->update();
        $lastID = $save_data->id;

        foreach ($request->lang as $key => $value){
            $save_lang = new TourLanguages();
            $save_lang->tour_id = $lastID;
            $save_lang->language_id = $key;
            $save_lang->title = $value['title'];
            $save_lang->meta_title = $value['meta_title'];
            $save_lang->meta_description = $value['meta_description'];
            $save_lang->description = $value['description'] ?? "Default";
            $save_lang->services_included = $value['services_included'];
            $save_lang->services_except = $value['services_except'];
            $save_lang->url = Str::slug($value['title']);
            $save_lang->update();
        }

        return redirect("manager/tours");
    }

    public function remove(int $id) {
        $remove = new Tour;
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
