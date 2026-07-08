<?php

namespace App\Repositories\Interfaces;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function getALl(): LengthAwarePaginator;

    public function getActive(?int $brand_id = null): Collection;

    public function store(array $data): void;

    public function update(array $data, Category $model): void;

    public function changeStatus(Category $model): void;
}
