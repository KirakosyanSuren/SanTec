<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use App\Services\AboutService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{

    public function __construct(
        private AboutService $aboutService
    ) {}

    public function index(): View
    {
        $about = $this->aboutService->get();

        return view('admin.about.index', compact('about'));
    }

    public function update(AboutRequest $request, string $lang, About $about): RedirectResponse
    {
        $this->aboutService->update($request->validated(), $about);

        return redirect()
            ->back()
            ->with('success', __('admin.messages.updated'));
    }
}
