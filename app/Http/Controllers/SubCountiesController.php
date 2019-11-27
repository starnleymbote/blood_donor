<?php

namespace App\Http\Controllers;

use App\SubCounties;
use App\Counties;
use App\Classes\Util;
use Session;
use Illuminate\Http\Request;

class SubCountiesController extends Controller
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
        $counties = Counties::all();
        return view('add_sub_county')->with('counties',$counties);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request,[
            'sub_county_name' => 'required|min:3',
            'county' => 'required'
        ]);

        $sub_county = new SubCounties;

        $sub_county ->name = $request ->input('sub_county_name');
        $sub_county ->county_id = $request ->input('county');
        
        $sub_county ->save();
        Session::flash('success', $sub_county->name.' was added succesfully');

        return redirect('/add_sub_county');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCounties  $subCounties
     * @return \Illuminate\Http\Response
     */
    public function show(SubCounties $subCounties)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCounties  $subCounties
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCounties $subCounties)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCounties  $subCounties
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCounties $subCounties)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCounties  $subCounties
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCounties $subCounties)
    {
        //
    }
}
