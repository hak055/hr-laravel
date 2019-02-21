<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Partner extends Model
{
    protected $fillable = [
    			'email',
    			'name',
    ];

     public function orders()
    {
        return $this->belongsTo(Order::class);
    } 
}
