<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandController extends Controller
{

    public function __construct(
        private BrandService $brandService
    ) {}

    public function index(): View
    {
        $brands = $this->brandService->getActive();

        return view('pages.brand', compact('brands'));
    }

    public function show($lang, string $slug): View
    {
        $brand = $this->brandService->findBySlug($slug);

        return view('pages.singleBrand', compact('brand'));
    }
}
