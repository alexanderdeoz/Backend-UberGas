<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;
    protected $table = 'app.dealers';
    protected $fillable = [
        'adress',
        'calification',
        'city',
        'country',
        'img_url',
        'name',
        'phone',
        'ranking',
        'time_close',
        'time_open',
    ];

      public function products()
    {
        return $this->hasMany(Product::class);
    }
}
