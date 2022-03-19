<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\inventory;
use App\Models\login_info;

class AdminController extends Controller
{
    //
    public function dashboard(){
        return view('pages.admin.dashboard');
    }
    public function login(Request $request){
        return view('login');
    }
}
