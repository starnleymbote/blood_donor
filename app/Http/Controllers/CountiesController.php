<?php

namespace App\Http\Controllers;

use App\Counties;
use Session;

use Illuminate\Http\Request;

class CountiesController extends Controller
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
        return view('add_county');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'county_name' => 'required|min: 4'
        ]);

        $county = new Counties;

        $county ->name = $request->input('county_name');
        $county->save();

        Session::flash('success', $county->name.' has been added succesfully');
        return redirect('/add_county');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Counties  $counties
     * @return \Illuminate\Http\Response
     */
    public function show(Counties $counties)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Counties  $counties
     * @return \Illuminate\Http\Response
     */
    public function edit(Counties $counties)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Counties  $counties
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counties $counties)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Counties  $counties
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counties $counties)
    {
        //
    }
}
