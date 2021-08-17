<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'app.roles';
    protected $fillable = [
        'name',
    ];

    

    function user()
    {
        return $this->belongsTo(Travel::class);
    }

    function client()
    {
        return $this->belongsTo(Client::class);
    }
    function driver()
    {
        return $this->belongsTo(Travel::class);
    }
}
