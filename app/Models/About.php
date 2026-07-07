<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Attributes\Casts;
use Illuminate\Database\Eloquent\Model;

#[Guarded([])]
class About extends Model
{
    protected $casts = [
        'title' => 'array',
        'description' => 'array',
    ];
}
