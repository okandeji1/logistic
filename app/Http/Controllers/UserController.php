<?php

namespace App\Http\Controllers;

use App\User;
use App\Settlement;
use App\role_tbl;
use Illuminate\Http\Request;
use Auth;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    protected function guard()
    {
        return Auth::guard('user');
    }
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
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.user')->with('users', $users);
    }
    /**
     * Login method
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->createToken('coachexpressdelivery')->accessToken;
            return redirect('/user-dashboard');
        } else {
            return back()->with(['error' => 'Invalid email or password'], 401);
        }
    }

    /**
     * Register method
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password',
        ]);

        $data = $request->only(['fullname', 'email', 'password']);
        $hashPassword = bcrypt($data['password']);
        
        // Check if user already exist
        if(User::where('email', '=', $data['email'])->exists()){
            return response()->json(['error' =>' Email already exist!']);
        }else {
            $user = new User();
            $user->uuid = Uuid::uuid4();
            $user->fullname = $data['fullname'];
            $user->email = $data['email'];
            $user->password = $hashPassword;
            $user->is_admin = 1;
            $user->role_id = 1;
            $user->save();
            // Create access token
            $user->createToken('coachexpressdelivery')->accessToken;
            // Redirect user
            return response()->json(['success' => ' Registration successful. Please login']);
        }
    }

    public function logout(Request $request)
    {
        $value = $request->bearerToken();
        if ($value) {
            $id = (new Parser())->parse($value)->getHeader('jti');
            User::table('oauth_access_tokens')->where('id', '=', $id)->update(['revoked' => 1]);
            $this->guard()->logout();
        }
        Auth::logout();
        return redirect('/');
    }
    
    public function settings($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }else {
            $user = User::where('uuid', '=',$uuid)->first();
        // Check for correct user
        return view('pages.auth.password_reset')->with('user', $user);
        }
    }

    /**
     * Edit Profile
     */
    public function editProfile($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }else {
            $user = User::where('uuid', $uuid)->first();
        // Check for correct user
        return view('pages.user.edit_profile')->with('user', $user);
        }
    }
    /**
     * Update profile settings
     */
    public function profileSettings(Request $request, $id)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required|email',
            'phoneNumber' => 'required|numeric',
            'address' => 'required'
        ]);
        $fullname = $request->fullname;
        $email = $request->email;
        $phoneNumber = $request->phoneNumber;
        $address = $request->address;
        $state = $request->state;
        $country = $request->country;
    
        // Check query
        try {
            // Get user id
            $updateProfile = User::find($id);
            $updateProfile->fullname = $fullname;
            $updateProfile->email = $email;
            $updateProfile->phoneNumber = $phoneNumber;
            $updateProfile->address = $address;
            $updateProfile->state = $state;
            $updateProfile->country = $country;
            $updateProfile->save();
            return redirect('/user-profile')->with('success', 'Profile Updated');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Unable to update profile' .$th);
        }
    }
    /**
     * Set Password
     */
    public function password(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|min:6',
            'cpassword' => 'same:password'
        ]);

        $password = $request->password;
        $hashPassword = bcrypt($password);
    
        // Check query
        try {
            // Get user id
            $changePassword = User::find($id);
            $changePassword->password = $hashPassword;
            $changePassword->save();
            return redirect('/user-dashboard')->with('success', 'Password Changed');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Unable to change password' .$th);
        }
    }

    /**
     * Forgot password
     */
    public function forgotPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        $email = $request->email;
        $user = User::where('email', '=', $email)->first();
        //Check if the user exists
        if (count($user) < 1) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }
        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => str_random(60),
            'created_at' => Carbon::now()
        ]);

        //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }

    /**
     * Reset Email
     */
    private function sendResetEmail($email, $token)
    {
        //Retrieve the user from the database
        $user = User::where('email', $email)->select('firstname', 'email')->first();
        //Generate, the password reset link. The token generated is embedded in the link
        $link = config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($user->email);

        try {
        //Here send the link with CURL with an external email API 
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Reset Password
     */
    public function resetPassword(Request $request)
    {
        //Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed',
            'token' => 'required' ]);

        //check if payload is valid before moving on
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }

        $password = $request->password;
        // Validate the token
        $tokenData = DB::table('password_resets')
        ->where('token', $request->token)->first();
        // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('auth.passwords.email');

        $user = User::where('email', $tokenData->email)->first();
        // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
        //Hash and update the new password
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
        ->delete();

        //Send Email Reset Success Email
        if ($this->sendSuccessEmail($tokenData->email)) {
            return view('index');
        } else {
            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        }

    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $deleteUser = User::find($id);
        // Check for correct user
        if($deleteUser){
            // Delete Image
            $deleteUser ->delete();
            return redirect('/admin/adm-user')->with('success', 'User was deleted successfuly');
        }else {
            return redirect('/admin/adm-user')->with('success', 'Unable to delete user');
        }
    }

    /**
     * Site login method
     */
    public function siteLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->createToken('coachexpressdelivery')->accessToken;
            return response()->json(['success', ' Login successful']);
        } else {
            return response()->json(['error', 'Invalid email or password'], 401);
        }
    }

    public function siteRegister(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'phone' => 'required',
        ]);

        $data = $request->only(['fullname', 'email', 'password', 'phone']);
        $hashPassword = bcrypt($data['password']);
        
        // Check if user already exist
        if(User::where('email', $data['email'])->exists()){
            return back()->with(['error' =>' Email already exist!']);
        }else {
            $user = new User();
            $user->uuid = Uuid::uuid4();
            $user->fullname = $data['fullname'];
            $user->email = $data['email'];
            $user->password = $hashPassword;
            $user->phoneNumber = $data['phone'];
            $user->role_id = 2;
            $user->save();
            // Create a subscription (settlement) for the new customer
            $settlement = new Settlement();
            $settlement->uuid = Uuid::uuid4();
            $settlement->user_id = $user->id;
            $settlement->save();
            // Create access token
            $user->createToken('coachexpressdelivery')->accessToken;
            // Redirect user
            return response()->json(['success', ' Registration successful']);
        }
    }
}