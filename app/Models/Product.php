<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'app.products';
    protected $fillable = [
        'description',
        'name',
        'price',
        'img_url',
        
    ];

    public function dealers()
    {
        return $this->belongsTo(Dealer::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
