<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function getALl(): LengthAwarePaginator
    {
        return Category::with('brands')
            ->latest()
            ->paginate(12);
    }

    public function getActive(?int $brand_id = null): Collection
    {
        return Category::where('is_active', 1)
            ->when($brand_id, function ($query) use ($brand_id) {
                $query->whereHas('brands', function ($q) use ($brand_id) {
                    $q->where('brands.id', $brand_id);
                });
            })
            ->latest()
            ->get();
    }

    public function store(array $data): void
    {

        $category = Category::create([
            'name' => [
                'hy' => $data['title_hy'],
                'ru' => $data['title_ru'],
                'en' => $data['title_en'],
            ]
        ]);

        $category->brands()->sync($data['brand_id']);
    }

    public function update(array $data, Category $model): void
    {
        $model->update([
            'name' => [
                'hy' => $data['title_hy'],
                'ru' => $data['title_ru'],
                'en' => $data['title_en'],
            ],
        ]);

        $model->brands()->sync($data['brand_id']);
    }

    public function changeStatus(Category $model): void
    {
        $isActive = !$model->is_active;

        DB::transaction(function () use ($model, $isActive) {

            $model->update([
                'is_active' => $isActive,
            ]);

            Product::where('category_id', $model->id)
                ->update([
                    'is_active' => $isActive,
                ]);

            $brands = $model->brands()->with('categories')->get();

            foreach ($brands as $brand) {

                if ($isActive) {
                    $brand->update([
                        'is_active' => true,
                    ]);

                    continue;
                }

                $hasAnotherActiveCategory = $brand->categories
                    ->where('id', '!=', $model->id)
                    ->where('is_active', true)
                    ->isNotEmpty();

                if (!$hasAnotherActiveCategory) {
                    $brand->update([
                        'is_active' => false,
                    ]);
                }
            }
        });
    }
}
