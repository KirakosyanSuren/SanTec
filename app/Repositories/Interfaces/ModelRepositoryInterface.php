<?php

namespace App\Repositories\Interfaces;

use App\Models\ProductModel;

interface ModelRepositoryInterface
{
    public function getByName(string $name): ProductModel;

    public function store(array $data): ProductModel;

    public function update(array $data, ProductModel $model): void;

    public function destroy(ProductModel $model): void;
}
