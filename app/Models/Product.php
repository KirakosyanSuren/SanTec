<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

#[Guarded([])]
class Product extends Model
{
    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function passport(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable')
            ->where('mime_type', 'application/pdf');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function models()
    {
        return $this->hasMany(ProductModel::class);
    }
}
