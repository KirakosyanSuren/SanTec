<?php

namespace App\Services;

use App\Models\Feedback;
use App\Repositories\Interfaces\FeedbackRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FeedbackService
{

    public function __construct(
        private FeedbackRepositoryInterface $feedbackRepository
    ) {}

    public function index(): LengthAwarePaginator
    {
        return $this->feedbackRepository->index();
    }

    public function store(array $data): void
    {
        $this->feedbackRepository->store($data);
    }

    public function destroy(Feedback $model): void
    {
        $this->feedbackRepository->destroy($model);
    }

    public function changeStatus(Feedback $model): void
    {
        $this->feedbackRepository->changeStatus($model);
    }
}
