<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'app.payments';
    protected $fillable = [
        'name',
    ];
    function users()
    {
        return $this->hasMany(User::class);
    }
    function clients()
    {
        return $this->belongsTo(Client::class);
    }
    function orders()
    {
        return $this->hasMany(Order::class);
    }
}
