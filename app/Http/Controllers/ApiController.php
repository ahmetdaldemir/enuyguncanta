<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getcustomer(Request $request)
    {
       return Customer::where("firstname","like",$request->searchText)->orWhere("lastname","like",$request->searchText)->get();
    }

    public function getproducts(Request $request)
    {
        return Product::where("name","like","%".$request->searchProducts."%")->get();
    }


}
