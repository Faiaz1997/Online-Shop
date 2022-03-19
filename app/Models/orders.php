<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orderdetails;
use App\Models\inventory;
use App\Models\login_info;


class orders extends Model
{
    use HasFactory;
    public $timestamps   = false;

    public function orderdetails(){
        return $this->hasMany(orderdetails::class,'order_id');
        //general syntax hasMany(model, foreignkey,primarykey)
    }
    public function customer(){
        return $this->belongsTo(login_info::class,'customer_id','id');
    }

}
