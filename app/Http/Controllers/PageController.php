<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index(){
        $vehicles = Vehicle::where('vehicle_status', 'Available')
            ->with('user')
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();

        return view('index', compact('vehicles'));
    }


    public function home(){
        $vehicles = Vehicle::where('vehicle_status', 'Available')->with('user')->get();
        return view('index', compact('vehicles'));
    }

    public function detailVehicle($id){
        $vehicles = Vehicle::with('user')->find($id);

        $images = $vehicles->images;

        return view('page.detailVehicle', compact('vehicles', 'images'));
    }

    public function browse(Request $request){
        $userLocation = $request->get('user_location');

        $filters = $request->all(); // Get all filter parameters from the request

        $vehiclesQuery = Vehicle::where('vehicle_status', 'Available'); // Base query

        // Apply filters based on user selections (if any)
        if (!empty($filters['vehicle_name'])) {
            $vehiclesQuery->where('vehicle_name', 'like', "%{$filters['vehicle_name']}%");
        }
        if (!empty($filters['vehicle_type'])) {
            $vehiclesQuery->where('vehicle_type', $filters['vehicle_type']);
        }
        if (!empty($filters['vehicle_brand'])) {
            $vehiclesQuery->where('vehicle_brand', $filters['vehicle_brand']);
        }
        if (!empty($filters['vehicle_category'])) {
            $vehiclesQuery->where('vehicle_category', $filters['vehicle_category']);
        }
        if (!empty($filters['vehicle_fuel_type'])) {
            $vehiclesQuery->where('vehicle_fuel_type', $filters['vehicle_fuel_type']);
        }
        if (!empty($filters['vehicle_transmission'])) {
            $vehiclesQuery->where('vehicle_transmission', $filters['vehicle_transmission']);
        }
        if (!empty($filters['vehicle_location'])) {
            $vehiclesQuery->where('vehicle_location', $filters['vehicle_location']);
        }

        $vehicles = $vehiclesQuery->simplePaginate(4); // PAGINATION HERE

        return view('page.browse', [
            'vehicles' => $vehicles,
            'filters' => $filters
        ]);
    }

    public function compare(){
        $vehicles = Vehicle::where('vehicle_status', 'Available')->with('user')->get();
        return view('page.compare', compact('vehicles'));
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerLogic(Request $request){
        // Validation rules with lowercase enforcement
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email:dns|unique:users',
            'phoneNumber' => 'required|regex:/^[1-9][0-9]{0,13}$/',
            'location' => 'required|min:3',
            'recoveryQuestion' => 'required|min:3',
            'recoveryAnswer' => 'required|min:3|alpha', // Ensures lowercase letters only
            'password' => 'required|min:8',
            'confirmPassword' => 'required|same:password',
        ];

        $messages = [
            'name.required' => 'Please enter your name.',
            'name.min' => 'Your name must be at least 3 characters long.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Hash passwords and create user
        $validatedData = $request->validate($rules);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['recoveryAnswer'] = bcrypt(strtolower($validatedData['recoveryAnswer'])); // Convert to lowercase before hashing

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone'=>  $validatedData['phoneNumber'],
            'location'=>  $validatedData['location'],
            'recovery_question'=>  $validatedData['recoveryQuestion'],
            'recovery_answer'=>  $validatedData['recoveryAnswer'],
            'password' => $validatedData['password']
        ]);


        // Success message and redirect
        $request->flash('success', 'Registration Success! Please Login');
        return redirect('/login');
    }

    public function loginLogic(Request $request){
        $dataLogin = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        // Check if email exists before attempting authentication
        $user = User::where('email', $dataLogin['email'])->first();

        if ($user) {
            // Email exists, now attempt authentication
            if (Auth::attempt($dataLogin)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            } else {
                // Email exists but password is incorrect
                return back()->withErrors([
                    'password' => 'Incorrect password',
                ]);
            }
        } else {
            // Email does not exist
            return back()->withErrors([
                'email' => 'Email not found',
            ]);
        }
    }


    public function loginRecovery(){
        return view('auth.loginRecovery');
    }

    public function loginRecoveryLogic(Request $request){
        $dataLogin = $request->validate([
            'email' => 'required|email:dns',
            'recovery_question' => 'required',
            'recovery_answer' => 'required'
        ]);

        $user = User::where('email', $dataLogin['email'])->first();

        if($user && $user->recovery_question === $dataLogin['recovery_question'] &&
            Hash::check($dataLogin['recovery_answer'], $user->recovery_answer)) {

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        else{
            return back()->with('errorlogin', 'Login Failed!');
        }
    }

    public function profile(){
        $user = Auth::user();
        return view('page.profile', compact('user'));
    }

    public function editProfile(){
        $user = Auth::user();
        return view('page.editProfile', compact('user'));
    }

    public function updateProfile(Request $request){
        $rules=[
            'name' => 'required|min:3',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|regex:/^[1-9][0-9]{0,13}$/',
            'location' => 'required|min:3'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->location = $request->input('location');
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
