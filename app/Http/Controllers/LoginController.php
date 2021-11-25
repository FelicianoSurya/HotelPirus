<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function viewIndex(){
        return view('login');
    }

    public function login(){
        return redirect('home');
    }
}
