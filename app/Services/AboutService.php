<?php

namespace App\Services;

use App\Models\About;
use App\Repositories\Interfaces\AboutRepositoryInterface;

class AboutService
{
    public function __construct(
        private AboutRepositoryInterface $aboutRepository
    ) {}

    public function get()
    {
        return $this->aboutRepository->get();
    }

    public function update(array $data, About $model): void
    {
        $this->aboutRepository->update($data, $model);
    }
}
