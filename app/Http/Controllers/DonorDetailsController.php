<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\DonorDetails;
use App\User;
use App\Counties;
use App\SubCounties;
use App\BloodType;
use App\DonationCenter;
use App\Classes\Util;
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
        $counties = Counties::all();
        $blood_group = BloodType::all();
        $sub_counties = SubCounties::all();
        $center = DonationCenter::all();


        // return $donor_details;
        return view('complete_registration')->with('center',$center)->with('blood_group',$blood_group)->with('donor_details',$donor_details)->with('counties',$counties)->with('sub_counties',$sub_counties);
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
            $details = new DonorDetails;
        
        $this ->validate($request, [
            'county' => 'required',
            'sub_county' => 'required',
            'center' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'blood_group' => 'required',
            'profile' => 'mimes: jpg,png,jpeg|required',
            
        ]);

        if($request ->hasFile('profile'))
        {
            $filenamewithExt = $request->file('profile')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $extension = $request->file('profile')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('profile')->storeAs('public/images',$fileNameToStore);

        }
        
        else
        {
            $fileNameToStore="default_user_avatar.png";
        }
        
        $details ->user_id = Auth::user()->id;
        $details ->county = $request ->input('county');
        $details ->sub_county = $request ->input('sub_county');
        $details ->gender = $request ->input('gender');
        $details ->phone = $request ->input('phone');
        $details ->donation_center_id = $request ->input('center');
        $details ->blood_group_id = $request ->input('blood_group');
        $details ->avatar = $fileNameToStore;
        $details ->avatar = $fileNameToStore;
        $details ->donated_blood_amount = 0;

        $details->save();

        $util = new Util;
        $result= $util ->sendSms(+254705822035,"Thank you for completing the form");

        return redirect('/');
        
    }

    public function returndonationdetails()
    {
        $donation_center = DonationCenter::select('id', 'name')->get();
        return view('user_donation_records')->with('donation_center', $donation_center);
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
