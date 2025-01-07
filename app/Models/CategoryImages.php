<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryImages extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryImagesFactory> */
    use HasFactory;
    protected $table = 'category_images';

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
