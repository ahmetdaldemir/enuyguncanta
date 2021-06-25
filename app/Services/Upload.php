<?php namespace App\Services;

use App\Contract\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Upload implements Image
 {
     protected $imageName;

     public function __construct(Request $request,string $module_name)
     {
         $validator = Validator::make($request->all(), [
             'image' => 'required|image',
         ]);

         if($validator->fails())
         {
                      Session::flash('alert-class', 'alert-danger');
             return   Session::flash('message', 'Resim Seçmediniz !');
         }
         $imageName = $module_name.'_'.time().'.'.$request->image->extension();
         $request->image->move(public_path('upload'), $imageName);
         $this->setImage($imageName);
         Session::flash('message', 'Resim Yüklendi !');
         Session::flash('alert-class', 'alert-success');
     }

    public function getImage()
    {
       return $this->imageName;
    }

    public function setImage(string $imageName)
    {
      return $this->imageName = $imageName;
    }
}
