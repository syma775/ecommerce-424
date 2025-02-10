<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function basket()
    {
        return $this->hasMany(Basket::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
