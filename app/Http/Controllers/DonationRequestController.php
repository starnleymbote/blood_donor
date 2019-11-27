<?php

namespace App\Http\Controllers;

use App\DonationRequest;
use App\DonationCenter;
use App\Classes\Util;
use App\BloodType;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
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
        $centre = DonationCenter::all();
        $blood_type = BloodType::all();
        return view('request_blood')->with('centre', $centre)->with('blood_type', $blood_type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $this ->validate($request, [ 
            'name' => 'bail|required', 
            'phone' => ['required'],
            'blood_group' => 'required',
            'center_id' => 'required',
            'purpose' => 'max:255'
            
        ]);

        $donor_request = new DonationRequest;

        $donor_request ->name = $request->input('name');
        $donor_request ->phone= $request->input('phone');
        $donor_request ->blood_group= $request->input('blood_group');
        $donor_request ->center_id= $request->input('center_id');
        $donor_request ->more_details= $request->input('purpose');

        $donor_request->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DonationRequest  $donationRequest
     * @return \Illuminate\Http\Response
     */
    public function show(DonationRequest $donationRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DonationRequest  $donationRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(DonationRequest $donationRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DonationRequest  $donationRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DonationRequest $donationRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DonationRequest  $donationRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonationRequest $donationRequest)
    {
        //
    }
}
