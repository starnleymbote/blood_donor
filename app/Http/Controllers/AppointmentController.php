<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Appointment;
use App\Counties;
use App\SubCounties;
use App\User;
use App\DonationCenter;
use App\DonorDetails;
use Illuminate\Http\Request;
use App\Classes\Util;
use Session;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::with(['donor.donation_center','donation_center.donor.user'])->get();
        
        // foreach ($appointments as $value) {
        //     //return $value->donation_center;
        // }
        //return $appointments;
        return view('appointments')->with('appointments',$appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centre = DonationCenter::all();
        return view('appointment')->with('centre',$centre);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request, [ 
            'center' => 'bail|required', 
            'app_date' => 'required',
            'purpose' => 'required|max:500',
            
        ]);

        $appointment = new Appointment;

        $appointment ->donor_id  = Auth::user()->id;
        $appointment ->appointment = $request->input('app_date');
        $appointment ->purpose  = $request->input('purpose');
        $appointment ->center_id = $request->input('center');

        //return $appointment;
        $appointment ->save();

        Session::flash('success', 'Appointment sent succesfully. Wait for a response via your phone');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function markasread($appointment_id)
    {
        $markasread = Appointment::find($appointment_id);

        //update the read_status values to note its read
        $markasread ->read_status = 1;

        $markasread ->save();

        return redirect()->back();
    }

    public function reply($appointment_id)
    {
        $sendSms = new Util;

        $get_donor_id = Appointment::select('*')->whereId($appointment_id)->get();

        foreach($get_donor_id as $donor_id)
        {
           $get_phone_number = DonorDetails::select('phone')->whereId($donor_id ->id)->get();
        }

        foreach($get_phone_number as $phone_number)
        {
            $phone_number->phone;

            $smsnumber = "+254".$phone_number->phone;
            $sendSms ->sendSms($smsnumber,"Hello dear donor, we will get into full contact with you soonest");
        }

        Session::flash('success', 'Reply sent succesfully');
        return redirect()->back();
    }

    public function specific_center_appointments()
    {
        $appointments = Appointment::with(['donor.donation_center','donation_center.donor.user'])->whereCenterId(Auth::User()->center_id)->get();

        return view('appointment_per_center')->with('appointments', $appointments);
    }

    
}
