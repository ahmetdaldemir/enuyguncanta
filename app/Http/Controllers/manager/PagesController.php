<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Pages;
use App\Models\PageLanguages;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class PagesController extends Controller
{
    public function __construct(){
        $this->languages = Language::all();
    }

    public function __invoke(){
        // TODO: Implement __invoke() method.
    }
    public function index(){
        $data['pages'] = DB::table("pages")
            ->join('page_languages', 'pages.id', '=', 'page_languages.page_id')
            ->where('page_languages.language_id','1')
            ->get(['page_languages.*', 'pages.*']);

        return view('manager.pages.index', $data);
    }

    public function create(){
        $data['languages'] = Language::all();
        return view('manager.pages.create', $data);
    }

    public function save(Request $request){
//        $this->validate($request, [
//            'title' => 'required'
//        ]);
        $save_data = new Pages();
        $save_data->manager_id = 1;
        $save_data->save();
        $lastID = $save_data->id;

        foreach ($request->lang as $key => $value){
            $save_lang = new PageLanguages();
            $save_lang->page_id = $lastID;
            $save_lang->language_id = $key;
            $save_lang->title = $value['title'];
            $save_lang->meta_title = $value['meta_title'];
            $save_lang->meta_description = $value['meta_description'];
            $save_lang->description = $value['description'] ?? " ";
            $save_lang->url = Str::slug($value['title']);
            $save_lang->save();
        }

        return redirect("manager/pages");
    }

    public function edit(int $id){
        $data['languages'] = Language::all();
        $data['page'] = Pages::find($id);
        $pageLanguages = PageLanguages::where("page_id",$id)->get();

        foreach ($pageLanguages as $pageLang) {
            $data['pageLanguage'][$pageLang->language_id] = array(
                'title' => $pageLang->title,
                'meta_title' => $pageLang->meta_title,
                'meta_description' => $pageLang->meta_description,
                'description' => $pageLang->description
            );
        }

        return view('manager.pages.edit', $data);
    }

    public function update(Request $request){
//        $this->validate($request, [
//            'day_count' => 'required'
//        ]);
        $save_data = new Pages();
        $save_data->save();
        $lastID = $save_data->id;

        foreach ($request->lang as $key => $value){
            $save_lang = new PageLanguages();
            $save_lang->page_id = $lastID;
            $save_lang->language_id = $key;
            $save_lang->title = $value['title'];
            $save_lang->meta_title = $value['meta_title'];
            $save_lang->meta_description = $value['meta_description'];
            $save_lang->description = $value['description'] ?? "Default";
            $save_lang->url = Str::slug($value['title']);
            $save_lang->save();
        }

        return redirect("manager/pages");
    }

    public function remove(int $id) {
        $remove = new Pages;
        $remove = $remove->find($id);
        if ($remove) {
            $remove->delete();
        }
        return redirect()->back();
    }
}
