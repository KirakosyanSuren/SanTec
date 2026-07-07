<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Model\CreateRequest;
use App\Http\Requests\Model\UpdateRequest;
use App\Models\ProductModel;
use App\Services\ModelService;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ModelController extends Controller
{

    public function __construct(
        private ModelService $modelService,
        private ProductService $productService
    ) {}

    public function index(): View
    {
        $models = $this->modelService->getAll();

        return view('admin.models.index', compact('models'));
    }

    public function create(): View
    {
        $products = $this->productService->getActiveForSelect();

        return view('admin.models.create', compact(
            'products'
        ));
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $this->modelService->store($request->validated());

        return redirect()
            ->route('admin.models.index')
            ->with('success', __('admin.messages.created'));
    }

    public function edit(string $lang, ProductModel $model): View
    {
        $products = $this->productService->getActiveForSelect();

        return view('admin.models.edit', compact(
            'model',
            'products'
        ));
    }

    public function update(string $lang, UpdateRequest $request, ProductModel $model): RedirectResponse
    {
        $this->modelService->update($request->validated(), $model);

        return redirect()
            ->route('admin.models.index')
            ->with('success', __('admin.messages.updated'));
    }

    public function destroy(string $lang, ProductModel $model): RedirectResponse
    {
        $this->modelService->destroy($model);

        return redirect()
            ->back()
            ->with('success', __('admin.messages.deleted'));
    }
}
