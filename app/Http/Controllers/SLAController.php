<?php

namespace App\Http\Controllers;

use App\SLA;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;


class SLAController extends Controller
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
            $slas = SLA::orderBy('created_at', 'desc')->paginate(20);
            // Get all customers
            $customers = User::where('role_id', 2)->get();
            // Get all sla client to fund account modal
            $clients = SLA::all();
            return view('pages.sla.manage_sla_client', compact(['slas', $slas, 'customers', $customers, 'clients', $clients]));
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
            'customerEmail' => 'required',
        ]);

        $customerEmail = $request->customerEmail;
        $code = 'CCH';
        $genCode = rand(0, 1000);
        $customerAccountId = $code.'-'.$genCode;

        try {
            //code...
            $user = User::where('email', $customerEmail)->firstOrFail();
            $user_id = $user->id;
            if(SLA::where('user_id', $user_id)->exists()){
                return back()->with(['error' =>' Customer already exist!']);
            }
            // update user sla field
            $user->is_sla = 1;

            $newSLA = new SLA();
            $newSLA->uuid = Uuid::uuid4();
            $newSLA->user_id = $user_id;
            $newSLA->accountId = $customerAccountId;
            $newSLA->save();
            $user->save();
            return back()->with('success', ' New sla client added successfully');
        } catch (\Throwable $th) {
            throw $th;
            // return back()->with(['error' => 'Internal server error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SLA  $sLA
     * @return \Illuminate\Http\Response
     */
    public function show(SLA $sLA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SLA  $sLA
     * @return \Illuminate\Http\Response
     */
    public function edit(SLA $sLA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SLA  $sLA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SLA $sLA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SLA  $sLA
     * @return \Illuminate\Http\Response
     */
    public function destroy(SLA $sLA)
    {
        //
    }
}
