<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\CreateRequest;
use App\Http\Requests\Brand\UpdateRequest;
use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BrandController extends Controller
{

    public function __construct(
        private BrandService $brandService
    ) {}

    public function index(): View
    {
        $brands = $this->brandService->getAll();

        return view('admin.brands.index', compact('brands'));
    }

    public function create(): View
    {
        return view('admin.brands.create');
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $this->brandService->store(
            $request->validated()
        );

        return redirect()
            ->route('admin.brands.index')
            ->with('success', __('admin.messages.created'));
    }

    public function edit(string $lang, Brand $brand): View
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(UpdateRequest $request, string $lang, Brand $brand): RedirectResponse
    {
        $this->brandService->update(
            $brand,
            $request->validated()
        );

        return redirect()
            ->route('admin.brands.index')
            ->with('success', __('admin.messages.updated'));
    }

    public function destroy(string $lang, Brand $brand): RedirectResponse
    {
        $this->brandService->destroy(
            $brand,
        );

        return redirect()
            ->back()
            ->with('success', __('admin.messages.deleted'));
    }

    public function changeStatus(string $lang, Brand $brand)
    {
        $this->brandService->changeStatus(
            $brand
        );

        return redirect()
            ->back()
            ->with('success', __('admin.messages.status_changed'));
    }
}
