<?php

namespace App\Http\Controllers;

use App\Fund;
use App\SLA;
use AUTH;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;


class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'slaClient' => 'required',
            'amount' => 'required|numeric',
            'paymentMode' => 'required',
            'transactionId' => 'required'
        ]);

        $slaClient = $request->slaClient;
        $amount = $request->amount;
        $paymentMode = $request->paymentMode;
        $transactionId = $request->transactionId;

        try {
            
            $newFund = new Fund();
            $newFund->uuid = Uuid::uuid4();
            $newFund->sla_id = $slaClient;
            $newFund->amount = $amount;
            $newFund->paymentMode = $paymentMode;
            $newFund->transactionId = $transactionId;
            $newFund->save();
            //Get the sla client details and increment his/her balance...
            $sla = SLA::where('id', $slaClient)->firstOrFail();
            if ($sla) {
                $sla->increment('balance', $amount);
            }
            return back()->with('success', ' Fund added successfully');
        } catch (\Throwable $th) {
            throw $th;
            // return back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function show(Fund $fund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function edit(Fund $fund)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fund $fund)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fund  $fund
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fund $fund)
    {
        //
    }
}
