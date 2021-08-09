<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'app.orders';
    protected $fillable = [
        'calification',
        'delivery_cost',
        'delivery_date',
        'method_payment',
        'state',
        'total_price',
        'wait_time',
        
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function users()
    {
        return $this->hasOne(User::class);
    }
    public function drivers()
    {
        return $this->hasOne(Driver::class);
    }
}
