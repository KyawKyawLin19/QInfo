<?php

namespace App\Http\Controllers;

use App\Volunteer;
use Illuminate\Http\Request;
use App\Center;
use App\Exports\VolunteersExport;
use Maatwebsite\Excel\Facades\Excel;

class VolunteerController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth')->except(['getVolunteers', 'searchVolunteer','getAllLists','searchAllVolunteers']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteers = Volunteer::first()->paginate(10);
        return view('admin.volunteer.index',compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centers = Center::all();
        return view('admin.volunteer.create',compact('centers'));
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
            'name' => 'required|max:100',
            'dob' => 'required',
            'nrc' => 'required|regex:/(^[0-9]{2}\/[A-Za-z]{6}\([A-Z]\)[0-9]{6})/u',
            'address' => 'required',
            'ph_no' => 'required|numeric',
            'center_id' => 'required',
        ],
        [
            'name.required' => 'Please Input Volunteer Name',
            'name.max' => 'Volunteer name must less than 100 characters',
            'dob.required' => 'Please Input Date of Birth',
            'nrc.required' => 'Please Input NRC',
            'address.required' => 'Please Input Volunteer Address',
            'ph_no.required' => 'Please Input Ph No',
        ]);

        $volunteer = Volunteer::create($validatedData);
        return redirect('volunteer')->with('success','Volunteer has been created');
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
        $centers = Center::all();
        return view('admin.volunteer.edit',compact(['centers','volunteer']));
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
        $validatedData = request() -> validate([
            'name' => 'required|max:100',
            'dob' => 'required',
            'nrc' => 'required|regex:/(^[0-9]{2}\/[A-Za-z]{6}\([A-Z]\)[0-9]{6})/u',
            'address' => 'required',
            'ph_no' => 'required|numeric',
            'center_id' => 'required',
        ],
        [
            'name.required' => 'Please Input Volunteer Name',
            'name.max' => 'Volunteer name must less than 100 characters',
            'dob.required' => 'Please Input Date of Birth',
            'nrc.required' => 'Please Input NRC',
            'address.required' => 'Please Input Volunteer Address',
            'ph_no.required' => 'Please Input Ph No',
        ]);

        $volunteer = $volunteer->update($validatedData);
        return redirect('volunteer')->with('success','volunteer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        $volunteer->delete();
        return redirect('/volunteer')->with('success','Volunteer deleted');
    }

    public function getVolunteers(Volunteer $volunteer,$id){
        $center = Center::find($id);
        $volunteers = $center->volunteers;
        return view('volunteer.volunteer_view',compact(['volunteers','id']));
    }

    public function searchVolunteer(Request $request,Volunteer $volunteers){

        $name = $request->searchWithName;
        $nrc = $request->searchWithNrc;
        $id = $request->centerid;

        $volunteers = $volunteers->newQuery();

        $volunteers->where('center_id',$id);
 
        if ($request->has('searchWithName')) {
            $volunteers->where('name','like','%'.$name.'%');
        }
    
        if ($request->has('searchWithNrc')) {
            $volunteers->where('nrc','like','%'.$nrc.'%');
        }
 
        $volunteers = $volunteers->get();
        return view('volunteer_view',compact(['volunteers','id']));
    }


    public function getAllLists(Volunteer $volunteers){
        $volunteers = Volunteer::all();
        return view('volunteer.all_volunteers_view',compact('volunteers'));
    }


    public function searchAllVolunteers(Request $request,Volunteer $volunteers){

        $name = $request->searchWithName;
        $nrc = $request->searchWithNrc;
     // $center = $request->searchWithCenter;

        $volunteers = $volunteers->newQuery();
 
        if ($request->has('searchWithName')) {
            $volunteers->where('name','like','%'.$name.'%');
        }
    
        if ($request->has('searchWithNrc')) {
            $volunteers->where('nrc','like','%'.$nrc.'%');
        }

        // if ($request->has('searchWithCenter')) {
        //     $patients->where('center_id','like','%'.$center.'%');
        // }
 
        $volunteers = $volunteers->get();
        return view('volunteer.all_volunteers_view',compact('volunteers'));
    }

    public function excel(){
        return Excel::download(new VolunteersExport, 'volunteers.xlsx');
    }
}
