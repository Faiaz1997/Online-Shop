<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orderdetails;

class product extends Model
{
    use HasFactory;
    public function orders(){
        $this->hasMany(orderdetails::class,'order_id');
    }
}