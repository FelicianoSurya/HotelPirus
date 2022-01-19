<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class HomeController extends Controller
{
    public function viewIndex(){
        $Inventories = Inventory::where('stock', '<' , '5')->get();
        return view('home',[
            'inventories' => $Inventories
        ]);
    }
}
