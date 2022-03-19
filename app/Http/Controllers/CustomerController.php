<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\login_info;
use App\Models\inventory;
use App\Models\orders;
use App\Models\orderdetails;
use App\Models\product;

class CustomerController extends Controller
{
    //
    public function Create(){
        return view('pages.customer.create');
    }
    public function createSubmit(Request $request){
        $this->validate(
            $request,
            [   
                'name'=>'required|max:20|',
                'phone'=>'required',
                'email'=>'required',
                'password'=>'required'
            ],
            [
                
                'name.required'=>'Please put your name',
                'phone.required'=>'Please put your phone number',
                'email.required'=>'Please put your email address',
                'password.required'=>'Please put your password'
                
            ]
        );

        $var = new login_info();
        $var->name= $request->name;
        $var->phone = $request->phone;
        $var->email = $request->email;
        $var->password = md5($request->password);
        $var->type = '2';
        $var->save();
        return redirect()->route('customer.login');     
    }
    // public function edit(Request $request){
    //     //
    //     $id = $request->id;
    //     $customer = customer::where('id',$id)->first();
    //     return view('pages.customer.login')->with('customer',$customer);
    // }
    // public function editSubmit(Request $request){
    //     $var = customer::where('id',$request->id)->first();
    //     $var->id = $request->id;
    //     $var->name= $request->name;
    //     $var->price = $request->phone;
    //     $var->save();
    //     return redirect()->route('pages.customer.login');

    // }
    // function deletesubmit(Request $request){
    //     $customer = customer::where('id' , $request->id)->first();
    //     $customer->delete();
    //     return redirect()->route('pages.customer.login');
    //     }
    public function dashboard(){
        return view('pages.customer.dashboard');
    }
   
    public function list(){
        $inventory = inventory::all();
        return view('pages.customer.list')->with('inventory',$inventory);
    }
    public function myorders(){
        $customer_id = session()->get('user');
        $orders = orders::where('customer_id',$customer_id)->get();
        return view('pages.products.myorders')->with('orders',$orders);
    }
    public function orderdetails(Request $request){
        $id = $request->id;
        $order = orders::where('id',$id)->first();
        //return $order->products[0]->order->customer;
        return view('pages.products.orderdetails')->with('order',$order);
    }
}