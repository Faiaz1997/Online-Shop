<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\login_info;
use App\Models\inventory;
use App\Models\orders;
use App\Models\orderdetails;
use App\Models\product;

class InventoryController extends Controller
{
    //
    public function Create(){
        return view('pages.inventory.create');
    }
    public function createSubmit(Request $request){
        $this->validate(
            $request,
            [   
                'name'=>'required',
                'price'=>'required',
                'quantity'=>'required',
                'description'=>'required',
                'image'=>'required|mimes:jpg,jpeg,png|max:5048',
            ],
            [
                'name.required'=>'Please put product name',
                'price.required'=>'Please put a price',
                'quantity.required'=>'Please put the quantity',
                'description.required'=>'Please put product description',
                'image.required'=>'Please put product image',
            ]
        );

        $NewImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'),$NewImageName);
        //dd($NewImageName);
        $var = new inventory();
        $var->name= $request->name;
        $var->price = $request->price;
        $var->quantity=$request->quantity;
        $var->description = $request->description;
        $var->image_path = $NewImageName;
        $var->save();
        return redirect()->route('inventory.list');     
    }
    public function list(){
        $inventory = inventory::all();
        return view('pages.inventory.list')->with('inventory',$inventory);
    }
    public function edit(Request $request){
        //
        $inventory = inventory::where('product_id',$request->id)->first();
        return view('pages.inventory.edit')->with('inventory',$inventory);
    }
    public function editSubmit(Request $request){
        $var = inventory::where('product_id', $request->id)->first();
        $var->name= $request->name;
        $var->price = $request->price;
        $var->quantity=$request->quantity;
        $var->description = $request->description;
        $var->save();
        return redirect()->route('inventory.list');

    }
    function deletesubmit(Request $request){
        $inventory = inventory::where('product_id' , $request->id)->first();
        $inventory->delete();
        return redirect()->route('inventory.list');
        }
}