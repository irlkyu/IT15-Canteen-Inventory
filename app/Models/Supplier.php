<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function products() {
        return $this->belongsToMany(Product::class, 'stock_entries')
                    ->withPivot('quantity', 'delivery_reference')
                    ->withTimestamps();
    }
}
