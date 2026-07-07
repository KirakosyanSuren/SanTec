<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

#[Guarded([])]
class ProductModel extends Model
{
    protected $casts = [
        'characteristic' => 'array'
    ];

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function mainImage(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable')
            ->where('is_main', true);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
