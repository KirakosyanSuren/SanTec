<?php

namespace App\Repositories;

use App\Models\Statistic;
use App\Repositories\Interfaces\StatisticsRepositoryInterface;
use Illuminate\Support\Collection;

class StatisticsRepository implements StatisticsRepositoryInterface
{

    public function getAll(): Collection {
        return Statistic::latest()->get();
    }

    public function getActive(): Collection {
        return Statistic::where('is_active', 1)
            ->latest()
            ->get();
    }


    public function store(array $data): void {

        Statistic::create(
            [
                'value' => $data['value'],

                'title' => [
                    'hy' => $data['title_hy'],
                    'ru' => $data['title_ru'],
                    'en' => $data['title_en'],
                ],
            ]
        );
    }

    public function update(array $data, Statistic $model): void {
        $model->update(
            [
                'value' => $data['value'],
                'title' => [
                    'hy' => $data['title_hy'],
                    'ru' => $data['title_ru'],
                    'en' => $data['title_en'],
                ],
            ]
        );
    }

    public function destroy(Statistic $model): void {
        $model->delete();
    }

    public function changeStatus(Statistic $model): void {
        $model->update([
            'is_active' => ! $model->is_active,
        ]);
    }

}
