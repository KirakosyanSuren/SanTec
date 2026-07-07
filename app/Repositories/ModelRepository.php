<?php

namespace App\Repositories;

use App\Models\ProductModel;
use App\Repositories\Interfaces\ModelRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ModelRepository implements ModelRepositoryInterface
{
    public function getByName(string $name): ProductModel {
        return ProductModel::where('name', $name)
            ->with(['product'])
            ->first();
    }

    public function getAll(): LengthAwarePaginator
    {
        return ProductModel::with('product')
            ->latest()
            ->paginate(12);
    }

    public function store(array $data): ProductModel
    {
        return ProductModel::create([
            'name' => $data['name'],
            'product_id' => $data['product_id'],
            'price' => $data['price'],
            'characteristic' => [
                'hy' => $data['characteristic_hy'],
                'ru' => $data['characteristic_ru'],
                'en' => $data['characteristic_en'],
            ]
        ]);
    }

    public function update(array $data, ProductModel $model): void {
        $model->update([
            'name' => $data['name'],
            'product_id' => $data['product_id'],
            'price' => $data['price'],
            'characteristic' => [
                'hy' => $data['characteristic_hy'],
                'ru' => $data['characteristic_ru'],
                'en' => $data['characteristic_en'],
            ]
        ]);
    }

    public function destroy(ProductModel $model): void
    {
        $model->delete();
    }
}
