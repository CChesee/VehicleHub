<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::where('vehicle_status', 'Available')->with('user')->get();

        return view('index', compact('vehicles'));
    }


    public function home(){
        $vehicles = Vehicle::where('vehicle_status', 'Available')->with('user')->get();
        // $images = $vehicles->images;

        return view('index', compact('vehicles'));
    }


    // public function browse(){
    //     $vehicles = Vehicle::where('vehicle_status', 'Available')->get();
    //     return view('page.browse', compact('vehicles'));
    // }
    public function browse(Request $request)
    {
        $userLocation = $request->get('user_location');

        $filters = $request->all(); // Get all filter parameters from the request

        $vehiclesQuery = Vehicle::where('vehicle_status', 'Available'); // Base query

        // Apply filters based on user selections (if any)
        if (isset($filters['vehicle_name']) && $filters['vehicle_name'] != '') {
            $vehiclesQuery->where('vehicle_name', 'like', "%{$filters['vehicle_name']}%");
        }
        if (isset($filters['vehicle_type']) && $filters['vehicle_type'] != '') {
            $vehiclesQuery->where('vehicle_type', $filters['vehicle_type']);
        }
        if (isset($filters['vehicle_brand']) && $filters['vehicle_brand'] != '') {
            $vehiclesQuery->where('vehicle_brand', $filters['vehicle_brand']);
        }
        if (isset($filters['vehicle_category']) && $filters['vehicle_category'] != '') {
            $vehiclesQuery->where('vehicle_category', $filters['vehicle_category']);
        }
        if (isset($filters['vehicle_fuel_type']) && $filters['vehicle_fuel_type'] != '') {
            $vehiclesQuery->where('vehicle_fuel_type', $filters['vehicle_fuel_type']);
        }
        if (isset($filters['vehicle_transmition']) && $filters['vehicle_transmition'] != '') {
            $vehiclesQuery->where('vehicle_transmition', $filters['vehicle_transmition']);
        }
        if (isset($filters['vehicle_location']) && $filters['vehicle_location'] != '') {
            $vehiclesQuery->where('vehicle_location', $filters['vehicle_location']);
        }

        $vehicles = $vehiclesQuery->get(); // Fetch filtered vehicles

        return view('page.browse', compact('vehicles'));
    }

    public function compare(){
        return view('page.compare');
    }

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerLogic(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' =>'required|email:dns|unique:users',
            'phoneNumber' => 'required|max:13',
            'location' => 'required|min:3',
            'recoveryQuestion' => 'required|min:3',
            'recoveryAnswer' => 'required|min:3',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|same:password'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['recoveryAnswer'] = bcrypt($validatedData['recoveryAnswer']);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone'=>  $validatedData['phoneNumber'],
            'location'=>  $validatedData['location'],
            'recovery_question'=>  $validatedData['recoveryQuestion'],
            'recovery_answer'=>  $validatedData['recoveryAnswer'],
            'password' => $validatedData['password']
        ]);

        $request->flash('success', 'Registration Success! Please Login');

        return redirect('/login');
    }
    public function loginLogic(Request $request){
        $dataLogin = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($dataLogin)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        else{
            return back()->with('errorlogin', 'Login Failed!');
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

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:15',
            'location' => 'nullable|string|max:255',
        ]);

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
