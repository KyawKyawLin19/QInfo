<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Center;
use App\Township;
use DB;
use App\Exports\PatientsExport;
use Maatwebsite\Excel\Facades\Excel;

class PatientController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth')->except(['getPatients', 'searchPatient','getAllLists','searchAllPatients']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::first()->paginate(5);
        return view('admin.patient.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centers = Center::all();
        return view('admin.patient.create',compact('centers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = request() -> validate([
            'p_name' => 'required|max:100',
            'dob' => 'required',
            'nrc' => 'required|unique:App\Patient,nrc|regex:/(^[0-9]{2}\/[A-Za-z]{6}\([A-Z]\)[0-9]{6})/u',
            'address' => 'required',
            'ph_no' => 'required|unique:App\Patient,ph_no|numeric',
            'center_id' => 'required',
            'room_no' => 'required|max:20',
        ],
        [
            'p_name.required' => 'Please Input Patient Name',
            'p_name.max' => 'Patient name must less than 100 characters',
            'dob.required' => 'Please Input Date of Birth',
            'nrc.required' => 'Please Input NRC',
            'address.required' => 'Please Input Patient Address',
            'ph_no.required' => 'Please Input Ph No',
            'room_no.required' => 'Please Input Room No',
            'room_no.max' => 'Room No must less than 20 characters',
            
        ]);

        $patient = Patient::create($validatedData);
        return redirect('patient')->with('success','Patient has been created');
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
        $centers = Center::all();
        return view('admin.patient.edit',compact(['centers','patient']));
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
        $validatedData = request() -> validate([
            'p_name' => 'required|max:100',
            'dob' => 'required',
            'nrc' => 'required|unique:App\Patient,nrc|regex:/(^[0-9]{2}\/[A-Za-z]{6}\([A-Z]\)[0-9]{6})/u',
            'address' => 'required',
            'ph_no' => 'required|unique:App\Patient,ph_no|numeric',
            'center_id' => 'required',
            'room_no' => 'required',
        ],
        [
            'p_name.required' => 'Please Input Patient Name',
            'p_name.max' => 'Patient name must less than 100 characters',
            'dob.required' => 'Please Input Date of Birth',
            'nrc.required' => 'Please Input NRC',
            'address.required' => 'Please Input Patient Address',
            'ph_no.required' => 'Please Input Ph No',
            'room_no.required' => 'Please Input Room No',
            'room_no.max' => 'Room No must less than 20 characters',
            
        ]);

        $patient = $patient->update($validatedData);
        return redirect('patient')->with('success','Patient has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect('/patient')->with('success','Patient deleted');
    }

    public function getPatients(Patient $patients,$id){
        $center = Center::find($id);
        $patients=$center->patients;
        return view('patient.patient_view',compact(['patients','id']));
    }

    public function searchPatient(Request $request,Patient $patients){

        $name = $request->searchWithName;
        $nrc = $request->searchWithNrc;
        $room = $request->searchWithRoomNo;
        $ph = $request->searchWithPhNo;
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

        if ($request->has('searchWithPhNo')) {
            $patients->where('ph_no','like','%'.$ph.'%');
        }
 
        $patients = $patients->get();
        return view('patient.patient_view',compact(['patients','id']));
    }


    public function getAllLists(Patient $patients){
        $patients = Patient::first()->paginate(10);
        $centers = Center::all();
        $paginate = true;
        return view('patient.all_patients_view',compact(['patients','centers','paginate']));
    }


    public function searchAllPatients(Request $request,Patient $patients){

        $name = $request->searchWithName;
        $nrc = $request->searchWithNrc;
        $phno = $request->searchWithPhNo;
        $room = $request->searchWithRoomNo;
        $center = $request->searchWithCenter;

        $patients = $patients->newQuery();
 
        if ($request->has('searchWithName')) {
            $patients->where('p_name','like','%'.$name.'%');
        }
    
        if ($request->has('searchWithNrc')) {
            $patients->where('nrc','like','%'.$nrc.'%');
        }

        if ($request->has('searchWithPhNo')) {
            $patients->where('ph_no','like','%'.$phno.'%');
        }
        
        if ($request->has('searchWithRoomNo')) {
            $patients->where('room_no','like','%'.$room.'%');
        }

        if ($request->has('searchWithCenter')) {
            $patients->where('center_id',$center);
        }
 
        $patients = $patients->get();
        $paginate = false;
        $centers = Center::all();
        return view('patient.all_patients_view',compact(['patients','centers','paginate']));
    }

    public function excel(){
        return Excel::download(new PatientsExport, 'patients.xlsx');
    }

}
