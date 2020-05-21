<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Township;
use App\City;
use App\Center;
use App\Patient;
use DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cities = City::all()->pluck('name','id');
        return view('index',compact('cities'));
    }

    public function getTownships($id)
    {
        $townships = Township::where('city_id',$id)->pluck('name','id');
        return json_encode($townships);
    }

    public function getData($id)
    {
        $cities = City::all()->pluck('name','id');
        $data = Center::where('township_id',$id)->get();
        return view('center_view',compact(['data','cities']));
    }
 
}
