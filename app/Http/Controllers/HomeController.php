<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Township;
use App\City;
use App\Center;
use App\Patient;
use App\Volunteer;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth')->only('admin_home');
    }
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
        return view('center.center_view',compact(['data','cities']));
    }

    public function admin_home(){
        $centers = Center::all();
        $patients = Patient::all();
        $volunteers = Volunteer::all();
        $townships = Township::all();
        return view('admin.admin_home',compact(['centers','patients','volunteers','townships']));
    }
    
    public function excel(){
        $patients = DB::table('patients');
    }

}
