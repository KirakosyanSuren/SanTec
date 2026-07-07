<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{

    public function getAll(array $filter): LengthAwarePaginator
    {
        return $this->applyFilters(
            Product::with(['brand', 'category']),
            $filter
        )
            ->latest()
            ->paginate(12)
            ->withQueryString();
    }

    public function getActive(array $filter): LengthAwarePaginator
    {
        return $this->applyFilters(
            Product::query()
                ->where('is_active', true)
                ->with(['brand', 'category', 'models.mainImage'])
                ->whereHas('models', function ($query) {
                    $query->where('is_active', true);
                }),
            $filter
        )
            ->when(!empty($filter['price_from']), function ($query) use ($filter) {
                $query->whereHas('models', function ($q) use ($filter) {
                    $q->where('is_active', true)
                        ->where('price', '>=', $filter['price_from']);
                });
            })
            ->when(!empty($filter['price_to']), function ($query) use ($filter) {
                $query->whereHas('models', function ($q) use ($filter) {
                    $q->where('is_active', true)
                        ->where('price', '<=', $filter['price_to']);
                });
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();
    }

    public function getActiveForSelect(): Collection
    {
        return Product::where('is_active', 1)
            ->with(['brand', 'category'])
            ->latest()
            ->get();
    }

    public function getRelatedProducts(Product $product): Collection
    {
        return $product->category
            ->products()
            ->where('is_active', 1)
            ->where('id', '!=', $product->id)
            ->has('models')
            ->latest()
            ->take(4)
            ->get();
    }

    public function store(array $data): Product
    {
        return Product::create($data);
    }

    public function update(array $data, Product $model): void
    {
        $model->update($data);
    }

    public function changeStatus(Product $model): void
    {
        $isActive = !$model->is_active;

        DB::transaction(function () use ($model, $isActive) {

            $model->update([
                'is_active' => $isActive,
            ]);

            if ($isActive) {

                $model->brand()->update([
                    'is_active' => true,
                ]);

                $model->category()->update([
                    'is_active' => true,
                ]);

                return;
            }

            $hasActiveProducts = Product::where('brand_id', $model->brand_id)
                ->where('id', '!=', $model->id)
                ->where('is_active', true)
                ->exists();

            if (!$hasActiveProducts) {
                $model->brand()->update([
                    'is_active' => false,
                ]);
            }

            $hasActiveProducts = Product::where('category_id', $model->category_id)
                ->where('id', '!=', $model->id)
                ->where('is_active', true)
                ->exists();

            if (!$hasActiveProducts) {
                $model->category()->update([
                    'is_active' => false,
                ]);
            }
        });
    }

    private function applyFilters(Builder $query, array $filter): Builder
    {
        return $query
            ->when(!empty($filter['name']), fn($q) => $q->where('name', 'like', '%' . $filter['name'] . '%')
            )
            ->when(!empty($filter['brand_id']), fn($q) => $q->where('brand_id', $filter['brand_id'])
            )
            ->when(!empty($filter['category_id']), fn($q) => $q->where('category_id', $filter['category_id'])
            );
    }
}
