<?php

namespace App\Http\Controllers;

use App\BloodBank;
use App\DonationCenter;
use App\DonorDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloodBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($center_id)
    {
        // get centers total blood amounts
        $get_name = DonationCenter::select('name')->whereId($center_id)->get();
        $total_blood_amount = BloodBank::where('center_id',$center_id)->sum('blood_amount');

        //get blood amount of the individual blood group
        $Apos = BloodBank::where('center_id',$center_id)->where('blood_type_id',1)->sum('blood_amount');
        $Aneg = BloodBank::where('center_id',$center_id)->where('blood_type_id',2)->sum('blood_amount');
        $Bpos = BloodBank::where('center_id',$center_id)->where('blood_type_id',3)->sum('blood_amount');
        $Bneg = BloodBank::where('center_id',$center_id)->where('blood_type_id',4)->sum('blood_amount');
        $AB = BloodBank::where('center_id',$center_id)->where('blood_type_id',5)->sum('blood_amount');
        $Opos = BloodBank::where('center_id',$center_id)->where('blood_type_id',6)->sum('blood_amount');
        $Oneg = BloodBank::where('center_id',$center_id)->where('blood_type_id',7)->sum('blood_amount');

        return view('blood_bank')
        ->with('total_blood_amount',$total_blood_amount)
        ->with('Apos',$Apos)
        ->with('Aneg',$Aneg)
        ->with('Bpos',$Bpos)
        ->with('Bneg',$Bneg)
        ->with('AB',$AB)
        ->with('Opos',$Opos)
        ->with('Oneg',$Oneg)
        ->with('get_name',$get_name);
    }

    public function user_index()
    {
       $donor_details = DonorDetails::find(Auth::user()->id);

        $get_blood_level = BloodBank::where('center_id',$donor_details ->donation_center_id)->where('blood_type_id',$donor_details ->blood_group_id)->sum('blood_amount');

        return view('user_index')->with('get_blood_level',$get_blood_level);
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
     * @param  \App\BloodBank  $bloodBank
     * @return \Illuminate\Http\Response
     */
    public function show(BloodBank $bloodBank)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BloodBank  $bloodBank
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodBank $bloodBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BloodBank  $bloodBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BloodBank $bloodBank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BloodBank  $bloodBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodBank $bloodBank)
    {
        //
    }
}
