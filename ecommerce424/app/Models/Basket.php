<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


}
