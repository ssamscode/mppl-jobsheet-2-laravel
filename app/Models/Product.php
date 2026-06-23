<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'category',
        'description',
        'image'
    ];

    public function flashSale()
{
    return $this->hasOne(FlashSale::class);
}
}