<?php

namespace App\Http\Controllers;

use App\Accident;
use App\Rider;
use Auth;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class AccidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $accidents = Accident::orderBy('created_at', 'desc')->paginate(20);
            $riders = Rider::all();
            return view('pages.accident.manage_accident', compact(['accidents', $accidents, 'riders', $riders]));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['error' => 'Internal server error']);
        }
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
        $this->validate($request, [
            'dateOfAccident' => 'required|date',
            'placeOfAccident' => 'required',
            'time' => 'required',
            'moment' => 'required',
            'descriptionOfBike' => 'required',
            'descriptionOfRider' => 'required',
            'costOfRepair'=> 'required|numeric',
            'dateOfRepair' => 'required|date',
            'mechanicName' => 'required',
            'mechanicNumber' => 'required',
            'mechanicShopAddress' => 'required',
            // 'insuranceClaim' => 'required',
            'riderEmail' => 'required',
        ]);

        $dateOfAccident = $request->dateOfAccident;
        $placeOfAccident = $request->placeOfAccident;
        $time = $request->time;
        $moment = $request->moment;
        $descriptionOfBike = $request->descriptionOfBike;
        $descriptionOfRider = $request->descriptionOfRider;
        $dateOfRepair = $request->dateOfRepair;
        $mechanicName = $request->mechanicName;
        $mechanicNumber = $request->mechanicNumber;
        $mechanicShopAddress = $request->mechanicShopAddress;
        $costOfRepair = $request->costOfRepair;
        $insuranceClaim = $request->insuranceClaim;
        $riderEmail = $request->riderEmail;
        // Time
        $timeOfAccident = $time . ' ' . $moment;

        try {
            //code...
            $rider = Rider::where('email', $riderEmail)->firstOrFail();
            $rider_id = $rider->id;

            $accident = new Accident();
            $accident->uuid = Uuid::uuid4();
            $accident->user_id = Auth::user()->id;
            $accident->rider_id = $rider_id;
            $accident->dateOfAccident = $dateOfAccident;
            $accident->placeOfAccident = $placeOfAccident;
            $accident->timeOfAccident = $timeOfAccident;
            $accident->descriptionOfBike = $descriptionOfBike;
            $accident->descriptionOfRider = $descriptionOfRider;
            $accident->dateOfRepair = $dateOfRepair;
            $accident->costOfRepair = $costOfRepair;
            $accident->mechanicName = $mechanicName;
            $accident->mechanicNumber = $mechanicNumber;
            $accident->mechanicShopAddress = $mechanicShopAddress;
            $accident->insuranceClaim = $insuranceClaim;
            $accident->save();
            return back()->with('success', ' Rider accident updated successfully');
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function show(Accident $accident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $accident = Accident::where('uuid' ,$uuid)->first();
            return view('pages.accident.bike_accident_details')->with('accident', $accident);
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accident $accident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accident $accident)
    {
        //
    }
}
