<?php

namespace App\Repositories\Interfaces;

use App\Models\Brand;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface BrandRepositoryInterface
{

    public function findBySlug(string $slug): Brand;

    public function getAll(): LengthAwarePaginator;

    public function getActive(): LengthAwarePaginator;

    public function getActiveForSelect(): Collection;

    public function store(array $data): Brand;

    public function update(Brand $model, array $data): void;

    public function destroy(Brand $model): void;

    public function changeStatus(Brand $model): void;

}
