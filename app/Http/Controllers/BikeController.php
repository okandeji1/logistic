<?php

namespace App\Http\Controllers;

use App\Bike;
use App\Rider;
use Auth;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;

class BikeController extends Controller
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
            $bikes = Bike::orderBy('created_at', 'desc')->paginate(20);
            return view('pages.bike.manage_bike')->with('bikes', $bikes);
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
        if (Auth::guest()){
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $riders = Rider::all();
            return view('pages.bike.create_bike')->with('riders', $riders);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with(['error' => 'Internal server error']);
        }
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
            'name' => 'required|string',
            'dateOfPurchase' => 'required|date',
            'placeOfPurchase' => 'required',
            'cost' => 'required|numeric',
            'brandingCost' => 'required|numeric',
            'plateNumber' => 'required',
            'accessoryBought' => 'required',
            'riderEmail' => 'required',
            'arkUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'nipostUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'lasaaUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'motUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'licenseUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'hackneyUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'lgaUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'lagosUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'ogunUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'lasaaStickerUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'freightUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
        ]);

        $name = $request->name;
        $dateOfPurchase = $request->dateOfPurchase;
        $placeOfPurchase = $request->placeOfPurchase;
        $cost = $request->cost;
        $brandingCost = $request->brandingCost;
        $plateNumber = $request->plateNumber;
        $accessoryBought = $request->accessoryBought;
        $arkRegDate = $request->arkRegDate;
        $nipostRegDate = $request->nipostRegDate;
        $lasaaRegDate = $request->lasaaRegDate;
        $motRegDate = $request->motRegDate;
        $licenseRegDate = $request->licenseRegDate;
        $hackneyRegDate = $request->hackneyRegDate;
        $lgaRegDate = $request->lgaRegDate;
        $lagosRegDate = $request->lagosRegDate;
        $ogunRegDate = $request->ogunRegDate;
        $lasaaStickerRegDate = $request->lasaaStickerRegDate;
        $freightRegDate = $request->freightRegDate;
        $riderEmail = $request->riderEmail;

        try {
            // Check if bike already exist
            if(Bike::where('plateNumber', $plateNumber)->exists()){
                return back()->with(['error' => ' Bike with this ' . $plateNumber . ' plate number already exist!']);
            }
            $newBike = new Bike();
            /**
             * Check if user upload any of the document one by one
             */
            // Ark upload doc
            if($request->hasFile('arkUpload')){
                $arkUpload = request()->file('arkUpload')->store('uploads', 'public');
                $newBike->arkUpload = $arkUpload; 
            }

            // Nipost upload doc
            if($request->hasFile('nipostUpload')){
                $nipostUpload = request()->file('nipostUpload')->store('uploads', 'public');
                $newBike->nipostUpload = $nipostUpload; 
            }

            // Lasaa upload doc
            if($request->hasFile('lasaaUpload')){
                $lasaaUpload = request()->file('lasaaUpload')->store('uploads', 'public');
                $newBike->lasaaUpload = $lasaaUpload; 
            }

            // Mot upload doc
            if($request->hasFile('motUpload')){
                $motUpload = request()->file('motUpload')->store('uploads', 'public');
                $newBike->motUpload = $motUpload; 
            }

            // License upload doc
            if($request->hasFile('licenseUpload')){
                $licenseUpload = request()->file('licenseUpload')->store('uploads', 'public');
                $newBike->licenseUpload = $licenseUpload; 
            }

            // Hackney upload doc
            if($request->hasFile('hackneyUpload')){
                $hackneyUpload = request()->file('hackneyUpload')->store('uploads', 'public');
                $newBike->hackneyUpload = $hackneyUpload; 
            }

            // LGA upload doc
            if($request->hasFile('lgaUpload')){
                $lgaUpload = request()->file('lgaUpload')->store('uploads', 'public');
                $newBike->lgaUpload = $lgaUpload; 
            }

            // Lagos upload doc
            if($request->hasFile('lagosUpload')){
                $lagosUpload = request()->file('lagosUpload')->store('uploads', 'public');
                $newBike->lagosUpload = $lagosUpload; 
            }

            // Ogun upload doc
            if($request->hasFile('ogunUpload')){
                $ogunUpload = request()->file('ogunUpload')->store('uploads', 'public');
                $newBike->ogunUpload = $ogunUpload; 
            }

            // lasaa sticker upload doc
            if($request->hasFile('lasaaStickerUpload')){
                $lasaaStickerUpload = request()->file('lasaaStickerUpload')->store('uploads', 'public');
                $newBike->lasaaStickerUpload = $lasaaStickerUpload; 
            }

            // Frieght upload doc
            if($request->hasFile('freightUpload')){
                $freightUpload = request()->file('freightUpload')->store('uploads', 'public');
                $newBike->freightUpload = $freightUpload; 
            }

            try {
                //code...
                $rider = Rider::where('email', $riderEmail)->firstOrFail();
                $rider_id = $rider->id;

                $newBike->uuid = Uuid::uuid4();
                $newBike->rider_id = $rider_id;
                $newBike->name = $name;
                $newBike->dateOfPurchase = $dateOfPurchase;
                $newBike->placeOfPurchase = $placeOfPurchase;
                $newBike->cost = $cost;
                $newBike->brandingCost = $brandingCost;
                $newBike->plateNumber = $plateNumber;
                $newBike->accessoryBought = $accessoryBought;
                $newBike->arkRegDate = $arkRegDate;
                $newBike->nipostRegDate = $nipostRegDate;
                $newBike->lasaaRegDate = $lasaaRegDate;
                $newBike->motRegDate = $motRegDate;
                $newBike->licenseRegDate = $licenseRegDate;
                $newBike->hackneyRegDate = $hackneyRegDate;
                $newBike->lgaRegDate = $lgaRegDate;
                $newBike->lagosRegDate = $lagosRegDate;
                $newBike->ogunRegDate = $ogunRegDate;
                $newBike->lasaaStickerRegDate = $lasaaStickerRegDate;
                $newBike->freightRegDate = $freightRegDate;
                $newBike->save();
                return redirect('/manage-bike')->with('success', ' Bike created successfully');
            } catch (\Throwable $th) {
                // throw $th;
                return back()->with(['error' => 'Internal server error']);
            }
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Display the specified resource.
     *return redirect()->back()->with(['error' => 'Internal server error']);
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function show(Bike $bike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bike  $bike
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
            $bike = Bike::where('uuid' ,$uuid)->first();
            return view('pages.bike.edit_bike')->with('bike', $bike);
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Listing of uploaded files
     */
    public function uploadedFiles($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $bike = Bike::where('uuid' ,$uuid)->first();
            return view('pages.bike.bike_uploads')->with('bike', $bike);
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'dateOfPurchase' => 'required|date',
            'placeOfPurchase' => 'required',
            'cost' => 'required|numeric',
            'brandingCost' => 'required|numeric',
            'plateNumber' => 'required',
            'accessoryBought' => 'required',
            'arkUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'nipostUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'lasaaUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'motUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'licenseUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'hackneyUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'lgaUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'lagosUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'ogunUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'lasaaStickerUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
            'freightUpload' => 'file|mimes:jpg,png,peg,svg,gif,jpeg|max:1028',
        ]);

        $name = $request->name;
        $dateOfPurchase = $request->dateOfPurchase;
        $placeOfPurchase = $request->placeOfPurchase;
        $cost = $request->cost;
        $brandingCost = $request->brandingCost;
        $plateNumber = $request->plateNumber;
        $accessoryBought = $request->accessoryBought;
        $arkRegDate = $request->arkRegDate;
        $nipostRegDate = $request->nipostRegDate;
        $lasaaRegDate = $request->lasaaRegDate;
        $motRegDate = $request->motRegDate;
        $licenseRegDate = $request->licenseRegDate;
        $hackneyRegDate = $request->hackneyRegDate;
        $lgaRegDate = $request->lgaRegDate;
        $lagosRegDate = $request->lagosRegDate;
        $ogunRegDate = $request->ogunRegDate;
        $lasaaStickerRegDate = $request->lasaaStickerRegDate;
        $freightRegDate = $request->freightRegDate;

        try {
            $updateBike = Bike::find($id);
            /**
             * Check if user upload any of the document one by one
             */
            // Ark upload doc
            if($request->hasFile('arkUpload')){
                $arkUpload = request()->file('arkUpload')->store('uploads', 'public');
                $updateBike->arkUpload = $arkUpload; 
            }

            // Nipost upload doc
            if($request->hasFile('nipostUpload')){
                $nipostUpload = request()->file('nipostUpload')->store('uploads', 'public');
                $updateBike->nipostUpload = $nipostUpload; 
            }

            // Lasaa upload doc
            if($request->hasFile('lasaaUpload')){
                $lasaaUpload = request()->file('lasaaUpload')->store('uploads', 'public');
                $updateBike->lasaaUpload = $lasaaUpload; 
            }

            // Mot upload doc
            if($request->hasFile('motUpload')){
                $motUpload = request()->file('motUpload')->store('uploads', 'public');
                $updateBike->motUpload = $motUpload; 
            }

            // License upload doc
            if($request->hasFile('licenseUpload')){
                $licenseUpload = request()->file('licenseUpload')->store('uploads', 'public');
                $updateBike->licenseUpload = $licenseUpload; 
            }

            // Hackney upload doc
            if($request->hasFile('hackneyUpload')){
                $hackneyUpload = request()->file('hackneyUpload')->store('uploads', 'public');
                $updateBike->hackneyUpload = $hackneyUpload; 
            }

            // LGA upload doc
            if($request->hasFile('lgaUpload')){
                $lgaUpload = request()->file('lgaUpload')->store('uploads', 'public');
                $updateBike->lgaUpload = $lgaUpload; 
            }

            // Lagos upload doc
            if($request->hasFile('lagosUpload')){
                $lagosUpload = request()->file('lagosUpload')->store('uploads', 'public');
                $updateBike->lagosUpload = $lagosUpload; 
            }

            // Ogun upload doc
            if($request->hasFile('ogunUpload')){
                $ogunUpload = request()->file('ogunUpload')->store('uploads', 'public');
                $updateBike->ogunUpload = $ogunUpload; 
            }

            // lasaa sticker upload doc
            if($request->hasFile('lasaaStickerUpload')){
                $lasaaStickerUpload = request()->file('lasaaStickerUpload')->store('uploads', 'public');
                $updateBike->lasaaStickerUpload = $lasaaStickerUpload; 
            }

            // Frieght upload doc
            if($request->hasFile('freightUpload')){
                $freightUpload = request()->file('freightUpload')->store('uploads', 'public');
                $updateBike->freightUpload = $freightUpload; 
            }

            try {
                //code...
                $updateBike->name = $name;
                $updateBike->dateOfPurchase = $dateOfPurchase;
                $updateBike->placeOfPurchase = $placeOfPurchase;
                $updateBike->cost = $cost;
                $updateBike->brandingCost = $brandingCost;
                $updateBike->plateNumber = $plateNumber;
                $updateBike->accessoryBought = $accessoryBought;
                $updateBike->arkRegDate = $arkRegDate;
                $updateBike->nipostRegDate = $nipostRegDate;
                $updateBike->lasaaRegDate = $lasaaRegDate;
                $updateBike->motRegDate = $motRegDate;
                $updateBike->licenseRegDate = $licenseRegDate;
                $updateBike->hackneyRegDate = $hackneyRegDate;
                $updateBike->lgaRegDate = $lgaRegDate;
                $updateBike->lagosRegDate = $lagosRegDate;
                $updateBike->ogunRegDate = $ogunRegDate;
                $updateBike->lasaaStickerRegDate = $lasaaStickerRegDate;
                $updateBike->freightRegDate = $freightRegDate;
                $updateBike->save();
                return redirect('/manage-bike')->with('success', ' Bike updated successfully');
            } catch (\Throwable $th) {
                // throw $th;
                return back()->with(['error' => 'Internal server error']);
            }
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bike $bike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function bikeDetails($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $bike = Bike::where('uuid' ,$uuid)->first();
            return view('pages.bike.bike_details')->with('bike', $bike);
        } catch (\Throwable $th) {
            // throw $th;
            return back()->with(['error' => 'Internal server error']);
        }
    }
}
