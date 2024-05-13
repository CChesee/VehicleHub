<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function index(){
        return view('index');
    }

    public function home(){
        return view('index');
    }

    public function browse(){
        return view('page.browse');
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
        return view('page.profile');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function myProduct(){
        $vehicles = Vehicle::all();
        return view('page.product.myProduct', compact('vehicles'));
    }

    public function addProduct(){
        return view ('page.product.addProduct');
    }

    public function addProductLogic(Request $request){
        // Validate the request data
        $request->validate([
            'vehicle_type' => 'required',
            'vehicle_brand' => 'required',
            'vehicle_name' => 'required',
            'vehicle_category' => 'required',
            'vehicle_transmition' => 'required',
            'vehicle_seat_capacity' => 'required',
            'vehicle_engine_capacity' => 'required',
            'vehicle_fuel_type' => 'required',
            'vehicle_fuel_tank_capacity' => 'required',
            'vehicle_fuel_compsumtion' => 'required',
            'vehicle_milage' => 'required',
            'vehicle_year_production' => 'required|numeric|max:' . date('Y'),
            'vehicle_tax' => 'required',
            'vehicle_service_fee' => 'required',
            'price' => 'required',
            'vehicle_status' => 'required',
        ]);

        // Get the authenticated user's ID
        $user_id = Auth::id();

        // Combine user ID with validated data
        $validatedData = array_merge(['user_id' => $user_id], $request->all());

        // Create new vehicle
        $new_vehicle = Vehicle::create($validatedData);

        // Handle image uploads if available

        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                // Move the image to the desired directory
                $imageName = $validatedData['vehicle_name'].'-image-'.time().rand(1, 1000).'.'.$image->extension();
                $image->move(public_path('vehicle_images'), $imageName);

                // Create a new Image record for each uploaded image
                Image::create([
                    'vehicle_id' => $new_vehicle->id,
                    'image' => $imageName
                ]);
            }
        }


        $request->flash('success', 'Success add new product!');

        // Redirect to myProduct route
        return redirect('/myProduct');
    }

}
