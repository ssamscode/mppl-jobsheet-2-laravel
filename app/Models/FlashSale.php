<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlashSale extends Model
{
    protected $fillable = [
        'product_id',
        'discount_price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}