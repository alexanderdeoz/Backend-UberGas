<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'app.roles';
    protected $fillable = [
        'condition',
        'description',
        'name',
    ];
    public $timestamps = false;

    

    function users()
    {
        return $this->hasMany(User::class);
    }

    function clients()
    {
        return $this->belongsTo(Client::class);
    }
    function drivers()
    {
        return $this->belongsTo(Travel::class);
    }
}
