<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'address',
        'city',
        'country',
        'postcode',
        'latitude',
        'longitude'
    ];
	
	public function products()
	{
		return $this->hasMany(Product::class);
	}
	
	public function sales()
	{
		return $this->hasMany(\Modules\Sale\Entities\Sale::class);
	}
}