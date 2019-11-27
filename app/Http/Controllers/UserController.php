<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DonorDetails;
use App\DonationCenter;
use App\BloodType;
use App\Counties;
use App\SubCounties;
use App\Classes\Util;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $users = User::with(['donor_details.donation_center','donor_details.blood_group'])->where('role_id', 1)->get();
        return $users;
        return view('allusers')->with('users',$users);
    }

    public function profile($donor_id)
    {
        $get_county_id = DonorDetails::select('sub_county','county')->whereUserId($donor_id)->get();
        //get user blood_group from blood_type table
        $donor_center = DonorDetails::with(['donation_center'])->whereUserId($donor_id)->get();
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

    public function new_admin()
    {
        //return the view for addding the new admin
        $centers = DonationCenter::all();
        return view('new_admin')->with('centers', $centers);
    }

    public function storenewadmin(Request $request)
    {
        $this ->validate($request, [
            'names' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'phone' => ['required', 'unique:users', 'min:10', 'max:13'],
            // 'profile' => 'mimes: jpg,jpeg,png' | 'required',
            
        ]);
            

        $new_admin = new User;

        $new_admin ->name = $request ->input('names');
        $new_admin ->email = $request ->input('email');
        $new_admin ->password = bcrypt($request ->input('password'));
        $new_admin ->role_id = $request ->input('role_id');
        $new_admin ->center_id = $request ->input('center_id');

        $util = new Util;

        $smsnumber = '+254704678645';
        $util->sendSms($smsnumber,"You Have been added as the new admin for ST iMMACULATE Heart. THanks Blood Donor System");


        //return $new_admin;
        $new_admin ->save();
        return redirect()->back();

    }

    //list all donor of a particular center
    public function center_donors()
    {

        $get_donor_details = DonorDetails::with(['user:id,name,email','Blood_group:id,name'])->where('donation_center_id',Auth::User()->center_id)->get();

        return view('center_donors')->with('get_donor_details', $get_donor_details);


    }

}
