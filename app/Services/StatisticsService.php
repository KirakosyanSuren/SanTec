<?php

namespace App\Services;

use App\Models\Statistic;
use App\Repositories\Interfaces\StatisticsRepositoryInterface;
use Illuminate\Support\Collection;

class StatisticsService
{
    public function __construct(
        private StatisticsRepositoryInterface $statisticsRepository
    ) {}

    public function getAll(): Collection
    {
        return $this->statisticsRepository->getAll();
    }

    public function getActive(): Collection
    {
        return $this->statisticsRepository->getActive();
    }

    public function store(array $data): void
    {
        $this->statisticsRepository->store($data);
    }

    public function update(array $data, Statistic $model): void
    {
        $this->statisticsRepository->update($data, $model);
    }

    public function destroy(Statistic $model)
    {
        $this->statisticsRepository->destroy($model);
    }

    public function changeStatus(Statistic $model): void {
        $this->statisticsRepository->changeStatus($model);
    }

}
