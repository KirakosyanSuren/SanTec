<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Product;
use App\Services\FeedbackService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function __construct(
        private FeedbackService $feedbackService
    ) {}

    public function index(): View
    {
        $feedbacks = $this->feedbackService->index();

        return view('admin.dashboard', [
            'brandsCount' => Brand::count(),
            'categoriesCount' => Category::count(),
            'productsCount' => Product::count(),
            'feedbacks' => $feedbacks
        ]);
    }

    public function feedback_destroy(string $lang, Feedback $feedback): RedirectResponse
    {
        $this->feedbackService->destroy($feedback);

        return redirect()
            ->back()
            ->with('success', __('admin.messages.deleted'));
    }

    public function feedback_changeStatus(string $lang, Feedback $feedback): RedirectResponse
    {
        $this->feedbackService->changeStatus($feedback);

        return redirect()
            ->back()
            ->with('success', __('admin.messages.status_changed'));
    }
}
