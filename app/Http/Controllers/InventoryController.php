<?php

namespace App\Http\Controllers;

use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\ModelService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InventoryController extends Controller
{

    public function __construct(
        private ProductService $productService,
        private ModelService $modelService,
        private BrandService $brandService,
        private CategoryService $categoryService
    ) {}

    public function index(Request $request): View
    {
        $products = $this->productService->getActive($request->all());
        $brands = $this->brandService->getActiveForSelect();
        $categories = $this->categoryService->getActive();

        return view('pages.inventory', compact(
            'products',
            'brands',
            'categories'
        ));
    }

    public function show(string $lang, string $name): View
    {
        $model = $this->modelService->getByName($name);
        $product = $model->product;
        $relatedProducts = $this->productService->getRelatedProducts($product);

        return view('pages.product', compact(
            'model',
            'product',
            'relatedProducts'
        ));
    }
}
