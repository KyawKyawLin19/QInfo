<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Center;
use App\Patient;
use App\Volunteer;
use App\Township;

class AdminController extends Controller
{
    public function index(){
        $centers = Center::all();
        $patients = Patient::all();
        $volunteers = Volunteer::all();
        $townships = Township::all();
        return view('admin.admin_home',compact(['centers','patients','volunteers','townships']));
    }
}
