<?php

namespace App\Services;

use App\Models\ProductModel;
use App\Repositories\Interfaces\ModelRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class ModelService
{

    public function __construct(
        private ModelRepositoryInterface $modelRepository,
        private FileService $fileService
    ) {}

    public function getByName(string $name): ProductModel
    {
        return $this->modelRepository->getByName($name);
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->modelRepository->getAll();
    }

    public function store(array $data): void
    {
        $model_data = Arr::except($data, ['image', 'main_image']);

        $model = $this->modelRepository->store($model_data);

        $this->fileService->uploadMany(
            model: $model,
            files: $data['image'],
            folder: 'image',
            mainIndex: (int) $data['main_image'],
        );
    }

    public function update(array $data, ProductModel $model): void
    {
        $model_data = Arr::except($data, ['image', 'main_image']);
        $this->modelRepository->update($model_data, $model);

        if (!empty($data['image'])) {
            $this->fileService->replaceMany(
                model: $model,
                files: $data['image'],
                folder: 'image',
                mainIndex: (int) $data['main_image'],
            );
        }
    }

    public function destroy(ProductModel $model): void
    {
        $this->fileService->deleteModelFiles(
            model: $model
        );

        $this->modelRepository->destroy($model);
    }
}
