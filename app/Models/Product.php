<?php

namespace App\Models;

use App\Models\Stock;

class Product extends BaseModel
{
    protected $table = 'product';

    public function track()
    {
        $this->stock->each->track();
    }

    public function inStock()
    {
        return $this->stock()->where('in_stock', true)->exists();
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
