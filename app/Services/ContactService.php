<?php

namespace App\Services;

use App\Models\Contact;
use App\Repositories\Interfaces\ContactRepositoryInterface;

class ContactService
{
    public function __construct(
        private ContactRepositoryInterface $contactRepository
    ) {}

    public function update(array $data, Contact $model): void
    {
        $this->contactRepository->update($data, $model);
    }
}
