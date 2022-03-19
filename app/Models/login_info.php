<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orders;

class login_info extends Model
{
    use HasFactory;
    protected $table = 'login_info';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public function orders(){
        return $this->hasMany(orders::class);
    }
}
