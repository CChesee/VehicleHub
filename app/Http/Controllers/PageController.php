<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function myProduct(){
        return view('page.myProduct');
    }

    public function about(){
        return view('about');
    }

}
