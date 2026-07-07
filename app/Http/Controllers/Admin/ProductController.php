<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Requests\Product\CreateRequest;
use App\Models\Product;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function __construct(
        private ProductService $productService,
        private BrandService $brandService,
        private CategoryService $categoryService
    ) {}

    public function index(Request $request): View
    {
        $products = $this->productService->getAll($request->all());
        $brands = $this->brandService->getActiveForSelect();
        $categories = $this->categoryService->getActive();

        return view('admin.products.index', compact(
            'products',
            'brands',
            'categories'
        ));
    }

    public function create(): View
    {
        $brands = $this->brandService->getActiveForSelect();
        $categories = $this->categoryService->getActive();

        return view('admin.products.create',
            compact(
                'brands',
                'categories'
            )
        );
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $this->productService->store($request->validated());

        return redirect()
            ->route('admin.products.index')
            ->with('success', __('admin.messages.created'));
    }

    public function edit(string $lang, Product $product): View
    {
        $brands = $this->brandService->getActiveForSelect();
        $categories = $this->categoryService->getActive();

        return view('admin.products.edit',
            compact(
                'product',
                'brands',
                'categories'
            )
        );
    }

    public function update(UpdateRequest $request, string $lang, Product $product): RedirectResponse
    {
        $this->productService->update($request->validated(), $product);

        return redirect()
            ->route('admin.products.index')
            ->with('success', __('admin.messages.updated'));
    }

    public function changeStatus(string $lang, Product $product): RedirectResponse
    {

        $this->productService->changeStatus($product);

        return redirect()
            ->back()
            ->with('success', __('admin.messages.status_changed'));
    }
}
