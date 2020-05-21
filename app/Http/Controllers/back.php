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
        dd($patients->centers);
        return view('patient_view',compact(['patients', 'id']));
    }

    public function searchPatients(Request $request,Patient $patients){

        $qusersname = $request->searchQusername;
        $qusersnrc = $request->searchWithNrc;
        $id = $request->centerid;

        $patients = $patients->newQuery();

        $patients->where('center_id',$id);
 
        if ($request->has('searchQusername')) {
            $patients->where('name','like','%'.$qusersname.'%');
        }
    
        if ($request->has('searchWithNrc')) {
            $patients->where('nrc','like','%'.$qusersnrc.'%');
        }
 
        $patients = $patients->get();
        return view('patient_view',compact(['patients','id']));
    }

    public function getAllLists(Patient $patients){
        $center = Center::find(2);
        dd($center->patients);
        return view('all_patients_view',compact('patients'));
    }
}
