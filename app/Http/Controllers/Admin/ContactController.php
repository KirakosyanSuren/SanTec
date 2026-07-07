<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{

    public function __construct(
        private ContactService $contactService
    ) {}

    public function index(): View
    {
        $contact = Contact::first();

        return view('admin.contact.index', compact('contact'));
    }

    public function update(ContactRequest $request, string $lang, Contact $contact): RedirectResponse
    {
        $this->contactService->update($request->validated(), $contact);

        return redirect()
            ->back()
            ->with('success', __('admin.messages.updated'));
    }
}
