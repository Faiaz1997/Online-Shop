<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orderdetails;


class inventory extends Model
{
    use HasFactory;   
    protected $table = 'inventory';
    protected $primaryKey = 'product_id';
    public $timestamps = true;
    public function orders(){
        $this->hasMany(orderdetails::class,'o_id');
    }
}