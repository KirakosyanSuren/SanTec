<?php

namespace App\Repositories\Interfaces;

use App\Models\Feedback;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface FeedbackRepositoryInterface
{

    public function index(): LengthAwarePaginator;
    public function store(array $data): void;

    public function destroy(Feedback $model): void;

    public function changeStatus(Feedback $model): void;

}
