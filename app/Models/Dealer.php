<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'app.dealers';
    protected $fillable = [
        'address',
        'calification',
        'city',
        'country',
        'img_url',
        'name',
        'phone',
        'time_close',
        'time_open',
    ];

      public function products()
    {
        return $this->hasMany(Product::class);
    }
}
