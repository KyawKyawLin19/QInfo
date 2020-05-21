<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Center;
use App\Township;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function getPatients(Patient $patients,$id){
        $center = Center::find($id);
        $patients=$center->patients;
        return view('patient_view',compact(['patients','id']));
    }

    public function searchPatient(Request $request,Patient $patients){

        $name = $request->searchWithName;
        $nrc = $request->searchWithNrc;
        $room = $request->searchWithRoomNo;
        $id = $request->centerid;

        $patients = $patients->newQuery();

        $patients->where('center_id',$id);
 
        if ($request->has('searchWithName')) {
            $patients->where('name','like','%'.$name.'%');
        }
    
        if ($request->has('searchWithNrc')) {
            $patients->where('nrc','like','%'.$nrc.'%');
        }

        if ($request->has('searchWithRoomNo')) {
            $patients->where('room_no','like','%'.$room.'%');
        }
 
        $patients = $patients->get();
        return view('patient_view',compact(['patients','id']));
    }


    public function getAllLists(Patient $patients){
        $patients = Patient::all();
        return view('all_patients_view',compact('patients'));
    }


    public function searchAllPatients(Request $request,Patient $patients){

        $name = $request->searchWithName;
        $nrc = $request->searchWithNrc;
     // $center = $request->searchWithCenter;
        $room = $request->searchWithRoomNo;

        $patients = $patients->newQuery();
 
        if ($request->has('searchWithName')) {
            $patients->where('name','like','%'.$name.'%');
        }
    
        if ($request->has('searchWithNrc')) {
            $patients->where('nrc','like','%'.$nrc.'%');
        }

        // if ($request->has('searchWithCenter')) {
        //     $patients->where('center_id','like','%'.$center.'%');
        // }

        if ($request->has('searchWithRoomNo')) {
            $patients->where('room_no','like','%'.$room.'%');
        }
 
        $patients = $patients->get();
        return view('all_patients_view',compact('patients'));
    }
}
