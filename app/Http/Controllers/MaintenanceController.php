<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\Bike;
use Auth;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class MaintenanceController extends Controller
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
            $maintenances = Maintenance::orderBy('created_at', 'desc')->paginate(20);
            $bikes = Bike::all();
            return view('pages.bike.bike_maintenance', compact(['maintenances', $maintenances, 'bikes', $bikes]));
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
            'bikeAccessoryOne' => 'required',
            'dateOfService' => 'required|date',
            'mechanicName' => 'required',
            'costOfService'=> 'required|numeric',
            'description' => 'required',
            // 'insuranceClaim' => 'required',
            'plateNumber' => 'required',
        ]);

        $bikeAccessoryOne = $request->bikeAccessoryOne;
        $bikeAccessoryTwo = $request->bikeAccessoryTwo;
        $bikeAccessoryThree = $request->bikeAccessoryThree;
        $dateOfService = $request->dateOfService;
        $dateOfService = $request->dateOfService;
        $dateOfService = $request->dateOfService;
        $mechanicName = $request->mechanicName;
        $costOfService = $request->costOfService;
        $description = $request->description;
        $insuranceClaim = $request->insuranceClaim;
        $plateNumber = $request->plateNumber;

        try {
            //code...
            $bike = bike::where('plateNumber', $plateNumber)->firstOrFail();
            $bike_id = $bike->id;

            $maintenance = new Maintenance();
            $maintenance->uuid = Uuid::uuid4();
            $maintenance->user_id = Auth::user()->id;
            $maintenance->bike_id = $bike_id;
            $maintenance->bikeAccessoryOne = $bikeAccessoryOne;
            $maintenance->bikeAccessoryTwo = $bikeAccessoryTwo;
            $maintenance->bikeAccessoryThree = $bikeAccessoryThree;
            $maintenance->dateOfService = $dateOfService;
            $maintenance->mechanicName = $mechanicName;
            $maintenance->costOfService = $costOfService;
            $maintenance->description = $description;
            $maintenance->insuranceClaim = $insuranceClaim;
            $maintenance->save();
            return back()->with('success', ' Bike maintenance updated successfully');
        } catch (\Throwable $th) {
            throw $th;
            // return back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
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
            $maintenance = Maintenance::where('uuid' ,$uuid)->first();
            return view('pages.bike.bike_maintenance_details')->with('maintenance', $maintenance);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        //
    }
}
