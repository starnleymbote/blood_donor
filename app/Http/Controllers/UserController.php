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
        $get_county_id = DonorDetails::select('sub_county','county')->whereId($donor_id)->get();
        //get user blood_group from blood_type table
        $donor_center = DonorDetails::with(['donation_center'])->whereId($donor_id)->get();
        //$get_county = Counties::
        foreach($get_county_id as $ids)
        {
            $county_id = $ids ->county;
            $sub_county_id = $ids ->sub_county;
        }

        $sub_county = SubCounties::select('name')->whereId($sub_county_id)->get();
        $county = Counties::select('name')->whereId($county_id)->get();
        $donor_details = User::with(['donor_details.blood_group'])->whereId($donor_id)->get();
        
        return view('user_profile')->with('sub_county',$sub_county)->with('county',$county)->with('donor_details',$donor_details)->with('donor_center',$donor_center);
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
