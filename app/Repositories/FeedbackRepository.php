<?php

namespace App\Repositories;

use App\Models\Feedback;
use App\Repositories\Interfaces\FeedbackRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FeedbackRepository implements FeedbackRepositoryInterface
{

    public function index(): LengthAwarePaginator {
        return Feedback::latest()->paginate(12);
    }

    public function store(array $data): void
    {
        Feedback::create($data);
    }

    public function destroy(Feedback $model): void {
        $model->delete();
    }

    public function changeStatus(Feedback $model): void
    {
        $model->update([
            'is_active' => ! $model->is_active,
        ]);
    }
}
