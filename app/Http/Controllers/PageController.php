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
        $vehicles = Vehicle::all();
        // $images = $vehicles->images;

        return view('index', compact('vehicles'));
    }

    public function home(){
        $vehicles = Vehicle::all();
        // $images = $vehicles->images;

        return view('index', compact('vehicles'));
    }


    public function browse(){
        $vehicles = Vehicle::all();
        // $images = $vehicles->images;

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
        return view('page.profile');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
