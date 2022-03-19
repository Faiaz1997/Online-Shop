<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orders;
use App\Models\inventory;

class orderdetails extends Model
{
    use HasFactory;
    public $timestamps   = false;
    public function product(){
        return $this->belongsTo(inventory::class,'product_id');
    }
    public function order(){
        return $this->belongsTo(orders::class,'order_id');
    }
}
