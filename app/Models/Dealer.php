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
        'city',
        'name',
        'phone',
        'timeClose',
        'timeOpen',
    ];

      public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }
}
