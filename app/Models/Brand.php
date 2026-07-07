<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

#[Guarded([])]
class Brand extends Model
{

    protected $casts = [
        'is_active' => 'boolean',
        'description' => 'array',
    ];

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable')
            ->where('mime_type', 'like', 'image/%');
    }

    public function certificates(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable')
            ->where('mime_type', 'application/pdf');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
