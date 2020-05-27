<?php

namespace App\Http\Controllers;

use App\Center;
use App\Township;
use Illuminate\Http\Request;
use App\Exports\CentersExport;
use Maatwebsite\Excel\Facades\Excel;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::first()->paginate(5);
        return view('admin.center.index',compact('centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $townships = Township::all();
        return view('admin.center.create',compact('townships'));
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
            'address' => 'required|max:100',
            'ph_no' => 'required|max:11',
            'township_id' => 'required'
        ],
        [
            'name.required' => 'Please Input Center Name',
            'name.max' => 'Center name must less than 100 characters',
            'address.required' => 'Please Input Center Address',
            'address.max' => 'Center Address must less than 100 characters',
            'ph_no.required' => 'Please Input Ph No',
            'ph_no.max' => 'Ph No must less than 11 numbers',
            
        ]);

        $center = Center::create($validatedData);
        return redirect('center')->with('success','Center has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function show(Center $center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function edit(Center $center)
    {
        $townships = Township::all();
        return view('admin.center.edit',compact(['townships','center']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Center $center)
    {
        $validatedData = request() -> validate([
            'name' => 'required|max:100',
            'address' => 'required|max:100',
            'ph_no' => 'required',
            'township_id' => 'required'
        ],
        [
            'name.required' => 'Please Input Center Name',
            'name.max' => 'Center name must less than 100 characters',
            'address.required' => 'Please Input Center Address',
            'address.max' => 'Center Address must less than 100 characters',
            'ph_no.required' => 'Please Input Ph No',
            'ph_no.max' => 'Ph No must less than 11 numbers',
            
        ]);

        $center = $center->update($validatedData);
        return redirect('center')->with('success','Center has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function destroy(Center $center)
    {
        $center->delete();
        return redirect('/center')->with('success','Center deleted');
    }

    public function excel_center(){
        return Excel::download(new CentersExport, 'centers.xlsx');
    }
}
