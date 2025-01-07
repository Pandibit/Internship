<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Size extends Model
{
    /** @use HasFactory<\Database\Factories\SizeFactory> */
    use HasFactory;

    protected $table = 'sizes';

    public function inventory(): HasOne
    {
        return $this->hasOne(Inventory::class);
    }

    public function order_item(): HasOne
    {
        return $this->hasOne(Order_item::class);
    }

}
