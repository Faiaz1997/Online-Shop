<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\login_info;
use App\Models\inventory;
use App\Models\orders;
use App\Models\orderdetails;
use App\Models\product;

class CartController extends Controller
{
    //
    public function cart(){
        $cart = json_decode(session()->get('cart'));
        return view('pages.products.cart')
        ->with('cart',$cart);
    }
    public function addtocart(Request $request){
        $id = $request->id;
        $p = inventory::where('product_id',$id)->first();
        $cart=[];
        //$jsonCart = $req->session()->get('cart'); to get session value
        //session()->get('cart')
        if(session()->has('cart')){
            $cart = json_decode(session()->get('cart'));
        }
        $product = array('id'=>$id,'quantity'=>1,'name'=>$p->name,'price'=>$p->price);
        $cart[] = (object)($product);
        $jsonCart = json_encode($cart);
        session()->put('cart',$jsonCart);
        return redirect()->back()->with('alert', 'Product Added');
        //return redirect()->route('home');
    }
    public function emptycart(){
        session()->forget('cart');
        if(!session()->has('cart')){
            return redirect()->back()->with('alert', 'Cart Cleared');
        }
        return session('cart');
    }
    public function checkout(Request $req){
        //let when logged in there will be a field in session
        $products = json_decode(session()->get('cart'));
        //creating order
        $customer_id = session()->get('user');
        $order = new orders();
        $order->customer_id = $customer_id;
        $order->status="Ordered";
        $order->price = $req->bill;
        $order->save();
        foreach($products as $p){
            $o_d= new orderdetails();
            $o_d->order_id = $order->id;
            $o_d->product_id = $p->id;
            $o_d->quantity = $p->quantity;
            $o_d->unit_price = $p->price;
            $o_d->save();
        }

        return redirect()->route('products.myorders')->with('alert', 'Order Sucessful');
        session()->forget('cart');
        
}
}
