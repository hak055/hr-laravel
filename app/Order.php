<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use App\Partner;
use App\Product;

class Order extends Model
{
    protected $fillable = [
        'status',
        'client_email',
        'partner_id',
        'delivery_dt',
    ];

    public function partner()
	{
		return $this->belongsTo(Partner::class);
	}

	

	public function products()
	{
		return $this->belongsToMany(Product::class, 'order_products')
		           ->withPivot('quantity', 'price');
	}
//расчет стоимость заказа
	public function totalsOeder()
    {
        $result = 0;
        if($this->products){
            foreach ($this->products as $product) {
                $result += $product->pivot->quantity * $product->pivot->price;
            }
        }
        return $result;
    }
//наименование стоимость заказа
    public function listProduct()
        {
            $listProduct = [];
            if($this->products) {

                    foreach($this->products as $product)
                    {
                        $listProduct[] = $product['name'];

                        
                    }   
                    return implode(", ", $listProduct);

                    


             }
        }

    public function statusWord()
    {
        if($this->status == 0){
            return 'новый';
        }elseif ($this->status == 10) {
            return 'подтвержден';
        }elseif ($this->status == 20) {
            return 'завершен';
        }
    }
    

   
}
