<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\login_info;
use App\Models\inventory;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        return view('login');
    }
    public function loginSubmit(Request $req){
        $c = login_info::where('email',$req->email)
                  ->where('password',md5($req->password))
                  ->first();
                  $this->validate(
                    $req,
                    [   
                        'email'=>'required',
                        'password'=>'required'
                    ],
                    [
                        
                        'email.required'=>'Please put your email number',
                        'password.required'=>'Please put your password'
                        
                    ]
                );
                if($c){
                    session()->put('user',$c->id);
                    if($c->type ==0){
                        return view('pages.admin.dashboard');
                    }
                    if($c->type ==1){
                        return view('pages.customer.dashboard');
                    }
                }
        return redirect()->route('login');

    }
    public function logout(){
        session()->flush();
        return redirect()->route('login');
    }
}
