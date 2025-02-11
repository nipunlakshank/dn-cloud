<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return Redirect::route('dashboard');
        }
        return view('welcome');
    }
}
