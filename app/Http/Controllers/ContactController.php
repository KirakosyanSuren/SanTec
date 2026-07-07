<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Contact;
use App\Services\FeedbackService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{

    public function __construct(
        private FeedbackService $feedbackService
    ) {}

    public function index(): View
    {
        $contact = Contact::first();

        return view('pages.contact', compact('contact'));
    }

    public function feedback(FeedbackRequest $request): RedirectResponse
    {
        $this->feedbackService->store($request->validated());

        return redirect()
            ->back()
            ->with('success', __('content.feedback_success'));
    }
}
