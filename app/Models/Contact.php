<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;

#[Guarded([])]
class Contact extends Model
{
    protected $casts = [
        'address' => 'array'
    ];
}
