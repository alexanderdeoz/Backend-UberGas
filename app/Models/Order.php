<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'app.orders';
    protected $fillable = [
        'deliveryCost',
        'deliveryDate',
        'payment',
        'state',
        'totalPrice',
        'waitTime',
        
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
    function travels()
    {
        return $this->hasMany(Travel::class);
    }
   
}
