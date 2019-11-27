<?php

namespace App\Http\Controllers;

use Session;
use App\DonorRecords;
use App\DonationCenter;
use Illuminate\Http\Request;
use App\Classes\Util;

class DonorRecordsController extends Controller
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

    public function donation_records(Request $request)
    {
        $this ->validate($request, [
             'email' => ['required', 'max: 150','email'],
             'pint' => ['nullable'],
             'donated_at' => ['required']

        ]);

        
        $store = new DonorRecords;

        $store ->center_id = $request ->input('donated_at');
        $store ->email = $request ->input('email');
        $store ->pints = $request ->input('pint');

        $store ->save();


        Session::flash('Record added succesfully');
        return redirect()->back();
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
     * @param  \App\DonorRecords  $donorRecords
     * @return \Illuminate\Http\Response
     */
    public function show(DonorRecords $donorRecords)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DonorRecords  $donorRecords
     * @return \Illuminate\Http\Response
     */
    public function edit(DonorRecords $donorRecords)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DonorRecords  $donorRecords
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DonorRecords $donorRecords)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DonorRecords  $donorRecords
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonorRecords $donorRecords)
    {
        //
    }
}
