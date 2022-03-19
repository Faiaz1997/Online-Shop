<?php

namespace App\Http\Controllers;
use App\Models\inventory;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $inventory = inventory::all();
        return view('pages.home')->with('inventory',$inventory);
    }
    //
}