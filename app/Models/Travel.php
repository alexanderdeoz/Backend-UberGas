<?php

namespace App\Models;

use App\Http\Controllers\DetailOrderController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $table = 'app.travels';
    protected $fillable = [];

    function drivers()
    {
        return $this->hasMany(Driver::class);
    }
    function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}
