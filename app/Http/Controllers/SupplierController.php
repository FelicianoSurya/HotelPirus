<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function viewIndex(){
        return view('supplier');
    }
}
