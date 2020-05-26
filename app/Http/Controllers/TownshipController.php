<?php

namespace App\Http\Controllers;

use App\Township;
use App\City;
use Illuminate\Http\Request;
use App\Exports\TownshipsExport;
use Maatwebsite\Excel\Facades\Excel;

class TownshipController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $townships = Township::first()->paginate(5);
        return view('admin.township.index',compact('townships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.township.create',compact('cities'));
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
            'city_id' => 'required',
            ]);

        $township = Township::create($validatedData);
        return redirect('township')->with('success','Township has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function show(Township $township)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function edit(Township $township)
    {
        $cities = City::all();
        return view('admin.township.edit',compact(['cities','township']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Township $township)
    {
        $validatedData = request() -> validate([
            'name' => 'required|max:100',
            'city_id' => 'required',
            ]);

        $township = $township->update($validatedData);
        return redirect('township')->with('success','Township has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function destroy(Township $township)
    {
        $township->delete();
        return redirect('/township')->with('success','Township deleted');
    }

    public function excel_township(){
        return Excel::download(new TownshipsExport, 'townships.xlsx');
    }
}
