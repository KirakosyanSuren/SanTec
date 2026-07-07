<?php

namespace App\Repositories;

use App\Models\About;
use App\Repositories\Interfaces\AboutRepositoryInterface;

class AboutRepository implements AboutRepositoryInterface
{
    public function get(): About {
        return About::first();
    }

    public function update(array $data, About $model): void {
        $model->update([
            'title' => [
                'hy' => $data['title_hy'],
                'ru' => $data['title_ru'],
                'en' => $data['title_en'],
            ],

            'description' => [
                'hy' => $data['description_hy'],
                'ru' => $data['description_ru'],
                'en' => $data['description_en'],
            ]
        ]);

    }
}
