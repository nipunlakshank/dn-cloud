<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return Redirect::route('chat');
        }
        return view('welcome');
    }
}
