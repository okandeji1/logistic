<?php

namespace App\Http\Controllers;

use App\Rider;
use App\Accident;
use Auth;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class RiderController extends Controller
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
            $riders = Rider::orderBy('created_at', 'desc')->paginate(20);
            return view('pages.user.manage_rider')->with('riders', $riders);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with(['error' => 'Internal server error']);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guest()) {
        //is a guest so redirect
        return redirect('/auth-login');
    }
    return view('pages.user.create_rider');
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
            'fullname' => 'required',
            'email' => 'required|email',
            'staffId' => 'required',
            'gender' => 'required',
            'phoneNumber' => 'required|numeric',
            'dob' => 'required',
            'designation' => 'required',
            'employmentStatus' => 'required',
            'location' => 'required',
            'employmentDate' => 'required',
            'emergencyContactName' => 'required',
            'emergencyContactNumber' => 'required',
            'emergencyContactNameTwo' => 'required',
            'emergencyContactNumberTwo' => 'required',
            'NOKName' => 'required',
            'NOKAddress' => 'required',
            'NOKPhone' => 'required',
            'guarantorName' => 'required',
            'guarantorAddress' => 'required',
            'guarantorPhone' => 'required',
            'bankName' => 'required',
            'staffSalary' => 'required',
            'bankAccNumber' => 'required|numeric',
            'driversLicense' => 'required',
            'insuranceDate' => 'required',
            'expiryDate' => 'required',
            
        ]);

        $fullname = $request->fullname;
        $email = $request->email;
        $staffId = $request->staffId;
        $gender = $request->gender;
        $phoneNumber = $request->phoneNumber;
        $dob = $request->dob;
        $designation = $request->designation;
        $employmentStatus = $request->employmentStatus;
        $location = $request->location;
        $employmentDate = $request->employmentDate;
        $emergencyContactName = $request->emergencyContactName;
        $emergencyContactNumber = $request->emergencyContactNumber;
        $emergencyContactNameTwo = $request->emergencyContactNameTwo;
        $emergencyContactNumberTwo = $request->emergencyContactNumberTwo;
        $NOKName = $request->NOKName;
        $NOKAddress = $request->NOKAddress;
        $NOKPhone = $request->NOKPhone;
        $guarantorName = $request->guarantorName;
        $guarantorAddress = $request->guarantorAddress;
        $guarantorPhone = $request->guarantorPhone;
        $bankName = $request->bankName;
        $staffSalary = $request->staffSalary;
        $bankAccNumber = $request->bankAccNumber;
        $driversLicense = $request->driversLicense;
        $expiryDate = $request->expiryDate;
        $insuranceDate = $request->insuranceDate;
               
        // Check if rider already exist
        if(Rider::where('email', $email)->exists()){
            return back()->with(['error' =>' Email already exist!']);
        }else {
            $rider = new Rider();
            $rider->uuid = Uuid::uuid4();
            $rider->fullname = $fullname;
            $rider->email = $email;
            $rider->staffId =  $staffId;
            $rider->gender = $gender;
            $rider->phoneNumber = $phoneNumber;
            $rider->dob = $dob;
            $rider->designation = $designation;
            $rider->employmentStatus = $employmentStatus;
            $rider->location = $location;
            $rider->employmentDate = $employmentDate;
            $rider->emergencyContactName = $emergencyContactName;
            $rider->emergencyContactNumber = $emergencyContactNumber;
            $rider->emergencyContactNameTwo = $emergencyContactNameTwo;
            $rider->emergencyContactNumberTwo = $emergencyContactNumberTwo;
            // Next of kin (NOK)
            $rider->NOKName = $NOKName;
            $rider->NOKAddress = $NOKAddress;
            $rider->NOKPhone = $NOKPhone;
            $rider->guarantorName = $guarantorName;
            $rider->guarantorAddress = $guarantorAddress;
            $rider->guarantorPhone = $guarantorPhone;
            $rider->bankName = $bankName;
            $rider->staffSalary = $staffSalary;
            $rider->bankAccNumber = $bankAccNumber;
            $rider->driversLicense = $driversLicense;
            $rider->expiryDate = $expiryDate;
            $rider->insuranceDate = $insuranceDate;
            try {
                $save = $rider->save();

                if ($save) {
                    // Redirect
                    return redirect('/manage-rider')->with(['success' => ' Rider successfully created.']);
                }
            } catch ( \Exception $e) {
                // Redirect
            return back()->with(['error' => ' Internal server error.']);
            }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function show(Rider $rider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rider  $rider
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
            $rider = Rider::where('uuid', '=' ,$uuid)->first();
            return view('pages.user.edit_rider')->with('rider', $rider);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update fields
     */
    public function updateDetails($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $rider = Rider::where('uuid', $uuid)->first();
            return view('pages.user.update_rider')->with('rider', $rider);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required|email',
            'staffId' => 'required',
            'gender' => 'required',
            'phoneNumber' => 'required|numeric',
            'dob' => 'required',
            'designation' => 'required',
            'employmentStatus' => 'required',
            'location' => 'required',
            'employmentDate' => 'required',
            'emergencyContactName' => 'required',
            'emergencyContactNumber' => 'required',
            'emergencyContactNameTwo' => 'required',
            'emergencyContactNumberTwo' => 'required',
            'NOKName' => 'required',
            'NOKAddress' => 'required',
            'NOKPhone' => 'required',
            'guarantorName' => 'required',
            'guarantorAddress' => 'required',
            'guarantorPhone' => 'required|numeric',
            'bankName' => 'required',
            'staffSalary' => 'required',
            'bankAccNumber' => 'required|numeric',
            'driversLicense' => 'required',
            'insuranceDate' => 'required',
            'expiryDate' => 'required',
            
        ]);

        $fullname = $request->fullname;
        $email = $request->email;
        $staffId = $request->staffId;
        $gender = $request->gender;
        $phoneNumber = $request->phoneNumber;
        $dob = $request->dob;
        $designation = $request->designation;
        $employmentStatus = $request->employmentStatus;
        $location = $request->location;
        $employmentDate = $request->employmentDate;
        $emergencyContactName = $request->emergencyContactName;
        $emergencyContactNumber = $request->emergencyContactNumber;
        $emergencyContactNameTwo = $request->emergencyContactNameTwo;
        $emergencyContactNumberTwo = $request->emergencyContactNumberTwo;
        $NOKName = $request->NOKName;
        $NOKAddress = $request->NOKAddress;
        $NOKPhone = $request->NOKPhone;
        $guarantorName = $request->guarantorName;
        $guarantorAddress = $request->guarantorAddress;
        $guarantorPhone = $request->guarantorPhone;
        $bankName = $request->bankName;
        $staffSalary = $request->staffSalary;
        $bankAccNumber = $request->bankAccNumber;

        $driversLicense = $request->driversLicense;
        $expiryDate = $request->expiryDate;
        $insuranceDate = $request->insuranceDate;
               
        try {
            
            //code...
            $update = Rider::where('id', $id)->update([
            'fullname' => $fullname,
            'email' => $email,
            'staffId' =>  $staffId,
            'gender' => $gender,
            'phoneNumber' => $phoneNumber,
            'dob' => $dob,
            'designation' => $designation,
            'employmentStatus' => $employmentStatus,
            'location' => $location,
            'employmentDate' => $employmentDate,
            'emergencyContactName' => $emergencyContactName,
            'emergencyContactNumber' => $emergencyContactNumber,
            'emergencyContactNameTwo' => $emergencyContactNameTwo,
            'emergencyContactNumberTwo' => $emergencyContactNumberTwo,
            // Next of kin (NOK)
            'NOKName' => $NOKName,
            'NOKAddress' => $NOKAddress,
            'NOKPhone' => $NOKPhone,
            'guarantorName' => $guarantorName,
            'guarantorAddress' => $guarantorAddress,
            'guarantorPhone' => $guarantorPhone,
            'bankName' => $bankName,
            'staffSalary' => $staffSalary,
            'bankAccNumber' => $bankAccNumber,
            'driversLicense' => $driversLicense,
            'expiryDate' => $expiryDate,
            'insuranceDate' => $insuranceDate,
            ]); 
            if ($update){
                            // Redirect
            return back()->with(['success' => ' Rider successfully updated.']);

            } else {
                            // Redirect
            return back()->with(['error' => ' Internal server error']);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with(['error' =>' Internal server error ']);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rider  $rider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $id = $request->id;
        $deleteRider = Rider::find($id);
        if($deleteRider){
            //Delete
            $deleteRider->delete();
            return response()->json('Rider deleted successfully', 200);
        }else {
            return response()->json('Unable to delete Rider');
        }
    }

    public function riderAccidents($id)
    {
        if (Auth::guest()){
            //is a guest so redirect
            return redirect('/');
        }
        try {
            //code...
            $accidents = Rider::find($id)->accidents;
            return view('pages.user.rider_accidents')->with('accidents', $accidents);
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Add bike accident to a particular bike
     */
    public function updateBikeAccident(Request $request)
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
            'insuranceClaim' => 'required',
            'rider' => 'required',
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
        $rider = $request->rider;
        // Time
        $timeOfAccident = $time . ' ' . $moment;

        try {
            //code...
            $accident = new Accident();
            $accident->uuid = Uuid::uuid4();
            $accident->user_id = Auth::user()->id;
            $accident->rider_id = $rider;
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
}