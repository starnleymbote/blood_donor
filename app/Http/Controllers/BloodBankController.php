<?php

namespace App\Http\Controllers;

use App\BloodBank;
use App\DonationCenter;
use App\DonorDetails;
use App\BloodType;
use Illuminate\Http\Request;
use App\Classes\Util;
use Illuminate\Support\Facades\Auth;
use Session;

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
        $get_blood_level = [10,20];
        $get_center_name = "St Immah";
       $donor_details = DonorDetails::where('user_id',Auth::User()->id)->get();

       //return $donor_details;
       foreach($donor_details as $details)
       {
        
        $get_blood_level = BloodBank::where('center_id',$details ->donation_center_id)->where('blood_type_id',$details ->blood_group_id)->sum('blood_amount');
        $get_center_name = DonationCenter::select('name')->where('id', $details->donation_center_id)->get();

       }
       
        return view('user_index')->with('average_level',$average_level)->with('critical_level',$critical_level);
        //  return view('user_index')->with('average_level',$average_level)->with('critical_level',$critical_level)->with('get_blood_level',$get_blood_level)->with('get_center_name', $get_center_name);
    }

    public function admin_index()
    {
        //return blood levels that are in between the critical range and the average range
       $average_level = BloodBank::with('centre','blood_type')->where('blood_amount' ,'>', 250)->where('blood_amount' ,'<', 400)->get();

       //return blood levels that are in between the critical range and the average range
       $critical_level = BloodBank::with('centre','blood_type')->where('blood_amount' ,'<', 231)->get();

       return view('su_admin_index')->with('average_level',$average_level)->with('critical_level',$critical_level);
    }


    public function view_drive()
    {
        return view('blood_drive');
    }

    public function blood_drive(Request $request)
    {
        $this ->validate($request,[
            'theme' => ['required','max:160','min: 10'],

        ]);

        $get_center_id = BloodBank::select('center_id')->where('blood_amount' ,'>', 250)->where('blood_amount' ,'<', 400)->get();
        $ids = $get_center_id->pluck('center_id');

        $get_phone = DonorDetails::select('phone')->wherein('donation_center_id',$ids)->get();

        //pluck phone number
        //$get_phone ->pluck('phone');
        //send sms notification
        $sms = new Util;
        //return $get_phone = array(1,2,3,4);


        foreach ($get_phone as $phone => $number)
        {
            //echo $number->center_id;


            //send blood donation request to all donor details of that center
            $sms = $util ->sendSms($number->phone,"We invite you for a blood drive on ". $request->inpu('date'). " at your donation center");
        }

        
        Session::flash('success', 'Drive initiated succesfully');
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

    public function transferview($center_id)
    {
        $other_centers = DonationCenter::select('id', 'name')->where('id', '!=', $center_id)->get();
        $get_donation_center = DonationCenter::select('id', 'name')->whereId($center_id)->get();
        
        return view('blood_transfer')->with('other_centers', $other_centers)->with('get_donation_center', $get_donation_center);
    }

    public function request_transfer(Request $request)
    {
        $this->validate($request,[
            'center_requesting_from' => ['required'],
            'amount' => ['required']
        ]);

        Session::flash('success', 'Request sent succesfully. Await response');
        return redirect()->back(); 

    }

    //get blood levels for a specific center
    public function center_blood_level()
    {
        $Apos = BloodBank::where('center_id',Auth::user()->center_id)->where('blood_type_id',1)->sum('blood_amount');
        $Aneg = BloodBank::where('center_id',Auth::user()->center_id)->where('blood_type_id',2)->sum('blood_amount');
        $Bpos = BloodBank::where('center_id',Auth::user()->center_id)->where('blood_type_id',3)->sum('blood_amount');
        $Bneg = BloodBank::where('center_id',Auth::user()->center_id)->where('blood_type_id',4)->sum('blood_amount');
        $AB = BloodBank::where('center_id',Auth::user()->center_id)->where('blood_type_id',5)->sum('blood_amount');
        $Opos = BloodBank::where('center_id',Auth::user()->center_id)->where('blood_type_id',6)->sum('blood_amount');
        $Oneg = BloodBank::where('center_id',Auth::user()->center_id)->where('blood_type_id',7)->sum('blood_amount');

        /**GETTING BLOOD TOTAL */
        $total_blood_amount = BloodBank::where('center_id',Auth::user()->center_id)->sum('blood_amount');

        $blood_level = BloodBank::select('blood_type_id', 'blood_amount')->whereCenterId(Auth::user()->center_id)->get();
        return view('center_blood_level')->with('total_blood_amount', $total_blood_amount)
                    ->with('Apos',$Apos)
                    ->with('Aneg',$Aneg)
                    ->with('Bpos',$Bpos)
                    ->with('Bneg',$Bneg)
                    ->with('AB',$AB)
                    ->with('Opos',$Opos)
                    ->with('Oneg',$Oneg);
    }

    //this is where you top up a centers blood level
    public function topup()
    {

        return view('top_up');
    }

    /**STORE THE UPDATED AMOUNT */
    public function post_topup(Request $request)
    {

        $findApos = BloodBank::find();
        $Apos = BloodBank::select('blood_amount')->where('center_id',Auth::User()->center_id)->where('blood_type_id',1)->get();
        $Aneg = BloodBank::select('blood_amount')->where('center_id',Auth::User()->center_id)->where('blood_type_id',2)->get();
        $Bpos = BloodBank::select('blood_amount')->where('center_id',Auth::User()->center_id)->where('blood_type_id',3)->get();
        $Bneg = BloodBank::select('blood_amount')->where('center_id',Auth::User()->center_id)->where('blood_type_id',4)->get();
        $AB = BloodBank::select('blood_amount')->where('center_id',Auth::User()->center_id)->where('blood_type_id',5)->get();
        $Opos = BloodBank::select('blood_amount')->where('center_id',Auth::User()->center_id)->where('blood_type_id',6)->get();
        $Oneg = BloodBank::select('blood_amount')->where('center_id',Auth::User()->center_id)->where('blood_type_id',7)->get();

        DB::update('update blood_banks set blood_amount = ? where center_id = ? AND blood_type_id = ?', [300],[1],[1]);
        foreach($Apos as $apos)
        {
            $apos->blood_amount;
        }
        // return $request->input('Apos');
        // return $request;
    }
}
