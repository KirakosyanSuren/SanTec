<?php

namespace App\Services;

use App\Models\Brand;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class BrandService
{

    public function __construct(
        private BrandRepositoryInterface $brandRepository,
        private FileService $fileService
    ) {}

    public function findBySlug(string $slug): Brand
    {
        return $this->brandRepository->findBySlug($slug);
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->brandRepository->getAll();
    }

    public function getActive(): LengthAwarePaginator {
        return $this->brandRepository->getActive();
    }


    public function getActiveForSelect(): Collection {
        return $this->brandRepository->getActiveForSelect();
    }

    public function store(
        array $data,
    ): void {

        $brand_data = Arr::except($data, ['logo', 'certificates']);
        $brand = $this->brandRepository->store($brand_data);

        $this->fileService->upload(
            model: $brand,
            file: $data['logo'],
            folder: 'logo',
        );

        $this->fileService->uploadMany(
            model: $brand,
            files: $data['certificates'],
            folder: 'certificates',
        );
    }

    public function update(
        Brand $model,
        array $data
    ): void {

        $brand_data = Arr::except($data, ['logo', 'certificates']);

        $this->brandRepository->update(
            $model,
            $brand_data
        );

        if (!empty($data['logo'])) {

            $this->fileService->replace(
                model: $model,
                file: $data['logo'],
                folder: 'logo',
            );
        }

        if (!empty($data['certificates'])) {

            $this->fileService->replaceMany(
                model: $model,
                files: $data['certificates'],
                folder: 'certificates'
            );
        }
    }

    public function destroy(Brand $model): void
    {
        $this->fileService->deleteModelFiles(
            model: $model
        );

        $this->brandRepository->destroy($model);
    }

    public function changeStatus(Brand $model)
    {
        $this->brandRepository->changeStatus($model);
    }
}
