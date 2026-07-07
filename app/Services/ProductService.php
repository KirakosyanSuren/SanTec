<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class ProductService
{

    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private FileService $fileService
    ) {}

    public function getAll(array $filter): LengthAwarePaginator
    {
        return $this->productRepository->getAll($filter);
    }

    public function getActive(array $filter): LengthAwarePaginator
    {
        return $this->productRepository->getActive($filter);
    }

    public function getActiveForSelect(): Collection
    {
        return $this->productRepository->getActiveForSelect();
    }

    public function getRelatedProducts(Product $product): Collection
    {
        return $this->productRepository->getRelatedProducts($product);
    }

    public function store(array $data): void
    {
        $product_data = Arr::except($data, ['passport']);

        $product = $this->productRepository->store($product_data);

        $this->fileService->upload(
            model: $product,
            file: $data['passport'],
            folder: 'passport',
        );
    }

    public function update(
        array $data,
        Product $model
    ): void{
        $product_data = Arr::except($data, ['passport']);
        $product = $this->productRepository->update($product_data, $model);

        if (!empty($data['passport'])) {

            $this->fileService->replace(
                model: $model,
                file: $data['passport'],
                folder: 'passport',
            );
        }
    }

    public function changeStatus(Product $model): void
    {
        $product = $this->productRepository->changeStatus($model);
    }
}
