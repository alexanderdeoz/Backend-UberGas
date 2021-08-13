<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
	use HasFactory;
	use SoftDeletes;
    protected $table = 'app.clients';
	protected $fillable = [
		'address',
		'payment_method'
	];

	public function orders()
	{
		return $this->belongsTo(Order::class);
	}
	public function products()
	{
		return $this->belongsToMany(Product::class, 'product_id', 'user_id')
			->withTimestamps();
	}
	public function users()
	{
		return $this->belongsTo(User::class);
	}
	function roles()
    {
        return $this->hasMany(Role::class);
    }
}
