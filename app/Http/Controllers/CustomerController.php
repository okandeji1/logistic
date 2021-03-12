<?php

namespace App\Http\Controllers;

use App\Customer;
use Auth;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class CustomerController extends Controller
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
            $customers = Customer::orderBy('created_at', 'desc')->paginate(20);
            return view('pages.user.manage_customer')->with('customers', $customers);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['error' => 'An error occur while loading this page']);
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
    return view('pages.user.create_customer');
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
            'fullname' => 'required|max:50',
            // 'email' => 'required|email',
            'phoneNumber' => 'required|numeric',
            'state' => 'required',
            'country' => 'required',
            'address' => 'required',
            'region' => 'required',
            'city' => 'required',
        ]);

        $data = $request->only(['fullname', 'email', 'phoneNumber', 'state', 'country', 'address', 'region', 'city']);        
        // Check if customer already exist
        if(Customer::where('phoneNumber', $data['phoneNumber'])->exists()){
            return back()->with(['error' =>' Customer already exist!']);
        }else {
            $customer = new Customer();
            $customer->uuid = Uuid::uuid4();
            $customer->fullname = $data['fullname'];
            $customer->email = $data['email'];
            $customer->phoneNumber = $data['phoneNumber'];
            $customer->state = $data['state'];
            $customer->country = $data['country'];
            $customer->address = $data['address'];
            $customer->region = $data['region'];
            $customer->city = $data['city'];
            $customer->save();
            // Redirect
            return redirect('/manage-customer')->with(['success' => ' Customer successfully created.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
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
            $customer = Customer::where('uuid', '=' ,$uuid)->first();
            return view('pages.user.edit_customer')->with('customer', $customer);
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
            $customer = Customer::where('uuid', $uuid)->first();
            return view('pages.user.update_customer')->with('customer', $customer);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $customer =  Customer::findOrFail($id);

        if ($customer){
            $update = Customer::where('id', $customer->id)->update([
            
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'address' => $request->address,
            'region' => $request->region,
            
            
            ]);
            if ($update) {
                return redirect('/manage-customer')->with(['success' => ' Customer details successfully edited.']);
            } else {
                return back()->with(['error' => 'Customer Detail not edited']);
            }
        } else {

            return back()->with(['error' => 'Customer does not exist']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $id = $request->id;
        $deleteCustomer = Customer::find($id);
        if($deleteCustomer){
            //Delete
            $deleteCustomer->delete();
            return response()->json('Customer deleted successfully', 200);
        }else {
            return response()->json('Unable to delete customer');
        }
    }
}
