<?php

namespace App\Models;

use App\Models\Stock;

class Retailer extends BaseModel
{
    protected $table = 'retailer';

    public function addStock(Product $product, Stock $stock)
    {
        $stock->product_id = $product->id;

        $this->stock()->save($stock);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
