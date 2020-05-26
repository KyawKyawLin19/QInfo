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
            'nrc' => 'required|unique:App\Patient,nrc',
            'address' => 'required',
            'ph_no' => 'required|unique:App\Patient,ph_no',
            'center_id' => 'required',
            'room_no' => 'required',
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
            'nrc' => 'required|unique:App\Patient,nrc|regex:[0-9]{2}\/[A-Za-z]{6}\([A-Z]{1}\)[0-9]{6}',
            'address' => 'required',
            'ph_no' => 'required|unique:App\Patient,ph_no',
            'center_id' => 'required',
            'room_no' => 'required',
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
        return view('patient.patient_view',compact(['patients','id']));
    }


    public function getAllLists(Patient $patients){
        $patients = Patient::all();
        return view('patient.all_patients_view',compact('patients'));
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
        return view('patient.all_patients_view',compact('patients'));
    }

    public function excel(){
        return Excel::download(new PatientsExport, 'patients.xlsx');
    }

}
