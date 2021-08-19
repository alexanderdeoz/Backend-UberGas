<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Driver extends Model
{
    use HasFactory;
	use SoftDeletes;
    protected $table = 'app.drivers';
	protected $fillable = [
		'name',
		'lastname',
		'birthay',
		'phone',
		'placa',
		'vehicle',
		'email',
        'email_verified_at',
        'password',


	];
	protected $hidden = [
        'password',
        'remember_token',
    ];

	public function orders()
	{
		return $this->belongsTo(Order::class);
	}
	public function users()
	{
		return $this->belongsTo(User::class);
	}
	function travels()
    {
        return $this->hasMany(Travel::class);
    }
}
