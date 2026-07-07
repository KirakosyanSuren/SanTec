<?php

namespace App\Repositories\Interfaces;

use App\Models\Statistic;
use Illuminate\Support\Collection;

interface StatisticsRepositoryInterface
{
    public function getAll(): Collection;

    public function getActive(): Collection;

    public function store(array $data): void;

    public function update(array $data, Statistic $model): void;

    public function destroy(Statistic $model): void;

    public function changeStatus(Statistic $model): void;
}
