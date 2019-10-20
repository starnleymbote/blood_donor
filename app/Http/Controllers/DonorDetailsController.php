<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\DonorDetails;
use App\User;
use Illuminate\Http\Request;

class DonorDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donor_id = Auth::user()->id;
        $donor_details = User::find($donor_id);

        // return $donor_details;
        return view('complete_registration')->with('donor_details',$donor_details);
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
     * @param  \App\DonorDetails  $donorDetails
     * @return \Illuminate\Http\Response
     */
    public function show(DonorDetails $donorDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DonorDetails  $donorDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(DonorDetails $donorDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DonorDetails  $donorDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DonorDetails $donorDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DonorDetails  $donorDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonorDetails $donorDetails)
    {
        //
    }
}
