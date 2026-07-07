<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;

#[Guarded([])]
class Category extends Model
{

    protected $casts = [
        'name' => 'array',
        'is_active' => 'boolean',
    ];

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
