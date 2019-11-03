<?php

namespace App\Http\Controllers;

use App\DonationCenter;
use App\Counties;
use App\SubCounties;
use Session;
use Illuminate\Http\Request;

class DonationCentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // retriev center name subcounty and count name
        $center = DonationCenter::join('counties','counties.id', '=', 'donation_centers.county')
        ->join('sub_counties','sub_counties.id', '=', 'donation_centers.sub_county_id')
        ->select('donation_centers.id as center_id','donation_centers.name','counties.name as county_name','sub_counties.name as sub_county')
        ->getQuery()
        ->get();

        return view('list_centers')->with('center',$center);
    }

    public function add_new_center()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counties = Counties::all();
        $sub_counties = SubCounties::all();

        
        return view('add_new_center')->with('counties',$counties)->with('sub_counties',$sub_counties);
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
            'center_name' => 'required|',
            'county' => 'required',
            'sub_county' => 'required'
        ]);

        
        $center = new DonationCenter;

        $center ->name = $request ->input('center_name');
        $center ->county = $request ->input('county');
        $center ->sub_county_id = $request ->input('sub_county');
        // return $center;
        $center ->save();
    
        Session::flash('success', $center->name.' has been added succesfully');

        return redirect('/newcenter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DonationCentre  $donationCentre
     * @return \Illuminate\Http\Response
     */
    public function show(DonationCentre $donationCentre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DonationCentre  $donationCentre
     * @return \Illuminate\Http\Response
     */
    public function edit(DonationCentre $donationCentre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DonationCentre  $donationCentre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DonationCentre $donationCentre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DonationCentre  $donationCentre
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonationCentre $donationCentre)
    {
        //
    }
}
