<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Services\BrandService;
use App\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function Pest\Laravel\delete;

class CategoryController extends Controller
{

    public function __construct(
        private BrandService $brandService,
        private CategoryService $categoryService
    ) {}

    public function index(): View
    {
        $categories = $this->categoryService->getAll();

        return view('admin.categories.index', compact('categories'));
    }

    public function findByBrand(string $lang, Brand $brand)
    {
        return response()->json(
            $brand->categories()->get(['categories.id', 'categories.name'])
        );
    }

    public function create(): View
    {
        $brands = $this->brandService->getActiveForSelect();

        return view('admin.categories.create', compact('brands'));
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->categoryService->store($request->validated());

        return redirect()
            ->route('admin.categories.index')
            ->with('success', __('admin.messages.created'));
    }

    public function edit($lang, Category $category): View
    {
        $brands = $this->brandService->getActiveForSelect();

        return view('admin.categories.edit', compact('category', 'brands'));
    }

    public function update(CategoryRequest $request, string $lang, Category $category): RedirectResponse
    {
        $this->categoryService->update($request->validated(), $category);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', __('admin.messages.updated'));
    }

    public function changeStatus(string $lang, Category $category): RedirectResponse
    {
        $this->categoryService->changeStatus($category);

        return redirect()
            ->back()
            ->with('success', __('admin.messages.status_changed'));    }
}
