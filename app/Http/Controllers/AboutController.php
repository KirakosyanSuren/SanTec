<?php

namespace App\Http\Controllers;

use App\Services\AboutService;
use App\Services\StatisticsService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{

    public function __construct(
        private AboutService $aboutService,
        private StatisticsService $statisticsService
    ) {}

    public function index(): View
    {
        $about = $this->aboutService->get();
        $statistics = $this->statisticsService->getActive();
        return view('pages.about', compact('about', 'statistics'));
    }
}
