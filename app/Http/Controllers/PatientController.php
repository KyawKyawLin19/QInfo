<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Center;
use App\Township;
use DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.patient_create');
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
            $patients->where('p_name','like','%'.$name.'%');
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
        $center = $request->searchWithCenter;
        $room = $request->searchWithRoomNo;

        $query = "SELECT * FROM patients";
        $sql = $query;
        $conditions = array();

        if(! empty($name)) {
            $conditions[] = "patients.p_name='$name'";
        }
        if(! empty($nrc)) {
            $conditions[] = "patients.nrc='$nrc'";
        }
        if(! empty($room)) {
            $conditions[] = "patients.room_no='$room'";
        }
        if(! empty($center)) {
            $sql .=" inner join centers ON patients.center_id = centers.id";
            $conditions[] = "centers.name='$center'";
        }

        if (count($conditions) > 0) {
        $sql .= " WHERE " . implode(' AND ', $conditions);
        }

        $patients = DB::select($sql);
        return view('all_patients_view',compact('patients'));
    }
}
