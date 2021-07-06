<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){return City::all();}
    public function getstate($id){ return State::where("city_id",$id)->get();}


}
