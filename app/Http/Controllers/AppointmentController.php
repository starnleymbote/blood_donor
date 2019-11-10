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
        $appointments = Appointment::with(['donor.donation_center','donor.user'])->get();
       
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
            'purpose' => 'required|max:100',
            
        ]);

        $appointment = new Appointment;

        $appointment ->donor_id  = Auth::user()->id;
        $appointment ->appointment = $request->input('app_date');
        $appointment ->purpose  = $request->input('purpose');
        $appointment ->center_id = $request->input('center');

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

    public function ok()
    {
        $markasread = Appointment::find(1);

        return $markasread;
    }
}
