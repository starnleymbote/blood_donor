<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DonorDetails;
use App\DonationCenter;
use App\BloodType;
use App\Counties;
use App\SubCounties;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with(['donor_details'])->get();

        return $user;
    }

    public function profile($donor_id)
    {
        
        //get user blood_group from blood_type table
        $donor_center = DonorDetails::with(['donation_center'])->get();
        $donor_details = User::with(['donor_details.blood_group'])->whereId($donor_id)->get();

        return view('user_profile')->with('donor_details',$donor_details)->with('donor_center',$donor_center);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
