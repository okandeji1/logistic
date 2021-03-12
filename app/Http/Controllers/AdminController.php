<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class AdminController extends Controller
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
            $admins = User::orderBy('created_at', 'desc')->paginate(20);
            return view('pages.user.manage_admin')->with('admins', $admins);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['error' => 'An error occur while loading this page ' .$th]);
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
        return view('pages.user.create_admin');
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
            'password' => 'required',
            'phoneNumber' => 'required|numeric',
            'state' => 'required',
            'country' => 'required',
            'address' => 'required',
        ]);

        $data = $request->only(['fullname', 'email', 'password', 'phoneNumber', 'state', 'country', 'address']);
        $hashPassword = bcrypt($data['password']);        
        // Check if user already exit
        if(User::where('email', $data['email'])->exists()){
            return back()->with('error', ' Email already exist!');
        }else {
            $user = new User();
            $user->uuid = Uuid::uuid4();
            $user->fullname = $data['fullname'];
            $user->email = $data['email'];
            $user->password = $hashPassword;            
            $user->phoneNumber = $data['phoneNumber'];
            $user->state = $data['state'];
            $user->country = $data['country'];
            $user->address = $data['address'];
            $user->role_id= 1;
            $user->is_admin = 1;
            $user->save();
            // Create access token
            $user->createToken('cbl')->accessToken;
            // Redirect user
            return back()->with('success', ' New User Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
            $admin = User::where('uuid', $uuid)->first();
            return view('pages.user.edit_admin')->with('admin', $admin);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);
        $id = $request->id;
        $deleteAdmin = User::find($id);
        if($deleteAdmin){
            //Delete
            $deleteAdmin->delete();
            return response()->json('User deleted successfully', 200);
        }else {
            return response()->json('Unable to delete user');
        }
    }
}
