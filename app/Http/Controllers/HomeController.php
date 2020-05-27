<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Township;
use App\City;
use App\Center;
use App\Patient;
use App\Volunteer;
use App\Country;
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

    public function admin_home()
    {
        $centers = Center::all();
        $patients = Patient::all();
        $volunteers = Volunteer::all();
        $townships = Township::all();
        return view('admin.admin_home',compact(['centers','patients','volunteers','townships']));
    }
    
    public function excel()
    {
        $patients = DB::table('patients');
    }

    public function getApiData()
    {
        $countries = Country::all();
        return view('info',compact('countries'));
    }

    public function searchData(Request $request){
        $id = $request->searchWithCountry-1;
        $data = Http::get('https://api.covid19api.com/summary')->json();
        $country = $data["Countries"][$id]["Country"];
        $newConfirmed = $data["Countries"][$id]["NewConfirmed"];
        $totalConfirmed = $data["Countries"][$id]["TotalConfirmed"];
        $newDeaths = $data["Countries"][$id]["NewDeaths"];
        $totalDeaths = $data["Countries"][$id]["TotalDeaths"];
        $newRecovered = $data["Countries"][$id]["NewRecovered"];
        $totalRecovered = $data["Countries"][$id]["TotalRecovered"];
        $date = $data["Countries"][$id]["Date"];
        $date =substr($date,0,10);
        return view('info_details',compact(['date','country','newConfirmed','totalConfirmed','newDeaths','totalDeaths','newRecovered','totalRecovered']));
    }

    public function contact(){
        return view('contact');
    }

}
