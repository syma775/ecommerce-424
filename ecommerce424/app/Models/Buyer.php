<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $guarded = [];

    public function basket()
    {
        return $this->hasMany(Basket::class);
    }
}
