<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Vendor;

class Product extends Model
{
    public function vendor()
	{
		return $this->belongsTo(Vendor::class);
	}
	
	public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products')->withPivot('quantity', 'price');
    }
}
