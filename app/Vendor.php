<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Vendor extends Model
{
    public function product()
	{
		return $this->belongsToMany(Product::class);
	}
}
