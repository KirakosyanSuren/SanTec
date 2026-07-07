<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function getAll(array $filter): LengthAwarePaginator;

    public function getActive(array $filter): LengthAwarePaginator;

    public function getActiveForSelect(): Collection;

    public function getRelatedProducts(Product $product): Collection;

    public function store(array $data): Product;

    public function update(array $data, Product $model): void;

    public function changeStatus(Product $model): void;
}
