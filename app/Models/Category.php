<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $table = 'categories';

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function image(): HasOne
    {
        return $this->hasOne(CategoryImages::class);
    }

    public function order_item(): HasOne
    {
        return $this->hasOne(Order_item::class);
    }


}
