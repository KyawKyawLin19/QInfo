<?php

namespace App\Http\Controllers;

use App\Volunteer;
use Illuminate\Http\Request;
use App\Center;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        //
    }

    public function getVolunteers(Volunteer $volunteer,$id){
        $center = Center::find($id);
        $volunteers = $center->volunteers;
        return view('volunteer_view',compact('volunteers'));
    }

    // public function searchPatient(Request $request,Patient $patients){

    //     $name = $request->searchWithName;
    //     $nrc = $request->searchWithNrc;
    //     $id = $request->centerid;

    //     $patients = $patients->newQuery();

    //     $patients->where('center_id',$id);
 
    //     if ($request->has('searchWithName')) {
    //         $patients->where('name','like','%'.$name.'%');
    //     }
    
    //     if ($request->has('searchWithNrc')) {
    //         $patients->where('nrc','like','%'.$nrc.'%');
    //     }
 
    //     $patients = $patients->get();
    //     return view('patient_view',compact(['patients','id']));
    // }


    public function getAllLists(Volunteer $volunteer){
        $volunteers = Volunteer::all();
        return view('all_volunteers_view',compact('volunteers'));
    }


    // public function searchAllPatients(Request $request,Patient $patients){

    //     $name = $request->searchWithName;
    //     $nrc = $request->searchWithNrc;
    //  // $center = $request->searchWithCenter;

    //     $patients = $patients->newQuery();
 
    //     if ($request->has('searchWithName')) {
    //         $patients->where('name','like','%'.$name.'%');
    //     }
    
    //     if ($request->has('searchWithNrc')) {
    //         $patients->where('nrc','like','%'.$nrc.'%');
    //     }

    //     // if ($request->has('searchWithCenter')) {
    //     //     $patients->where('center_id','like','%'.$center.'%');
    //     // }
 
    //     $patients = $patients->get();
    //     return view('all_patients_view',compact('patients'));
    // }
}
