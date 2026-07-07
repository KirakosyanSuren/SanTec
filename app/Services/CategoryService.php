<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CategoryService
{
    public function __construct(
        private CategoryRepositoryInterface $categoryRepository
    ) {}

    public function getALl(): LengthAwarePaginator
    {
        return $this->categoryRepository->getAll();
    }

    public function getActive(): Collection
    {
        return $this->categoryRepository->getActive();
    }

    public function store(array $data): void
    {
        $this->categoryRepository->store($data);
    }

    public function update(array $data, Category $model): void
    {
        $this->categoryRepository->update($data, $model);
    }

    public function changeStatus(Category $model): void
    {
        $this->categoryRepository->changeStatus($model);
    }
}
