<?php

namespace App\Repositories\Interfaces;

use App\Models\Contact;

interface ContactRepositoryInterface
{
    public function update(array $data, Contact $model): void;
}
