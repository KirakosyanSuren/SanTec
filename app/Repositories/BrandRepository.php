<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Models\Product;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BrandRepository implements BrandRepositoryInterface
{

    public function findBySlug(string $slug): Brand
    {
        return Brand::where('slug', $slug)->first();
    }

    public function getAll(): LengthAwarePaginator
    {
        return Brand::latest()->paginate(12);
    }

    public function getActive(): LengthAwarePaginator
    {
        return Brand::where('is_active', 1)
            ->withCount('products')
            ->latest()
            ->paginate(12);
    }

    public function getActiveForSelect(): Collection
    {
        return Brand::where('is_active', 1)
            ->withCount('products')
            ->latest()
            ->get();
    }

    public function store(array $data): Brand
    {
        return Brand::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'description' => [
                'hy' => $data['description_hy'],
                'ru' => $data['description_ru'],
                'en' => $data['description_en'],
            ]
        ]);
    }

    public function update(Brand $model, array $data): void
    {
        $model->update([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'description' => [
                'hy' => $data['description_hy'],
                'ru' => $data['description_ru'],
                'en' => $data['description_en'],
            ]
        ]);
    }

    public function destroy(Brand $model): void
    {
        $model->delete();
    }

    public function changeStatus(Brand $model): void
    {
        $isActive = !$model->is_active;

        DB::transaction(function () use ($model, $isActive) {

            $model->update([
                'is_active' => $isActive,
            ]);

            Product::where('brand_id', $model->id)
                ->update([
                    'is_active' => $isActive,
                ]);

            $categories = $model->categories()->with('brands')->get();

            foreach ($categories as $category) {

                if ($isActive) {
                    $category->update([
                        'is_active' => true,
                    ]);

                    continue;
                }

                $hasAnotherActiveBrand = $category->brands
                    ->where('id', '!=', $model->id)
                    ->where('is_active', true)
                    ->isNotEmpty();

                if (!$hasAnotherActiveBrand) {
                    $category->update([
                        'is_active' => false,
                    ]);
                }
            }
        });
    }

}
