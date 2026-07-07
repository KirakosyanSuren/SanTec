<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use Illuminate\Support\Collection;

class ContactRepository implements ContactRepositoryInterface
{
    public function update(array $data, Contact $model): void {
        $model->update([
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => [
                'hy' => $data['address_hy'],
                'ru' => $data['address_ru'],
                'en' => $data['address_en']
            ]
        ]);
    }
}
