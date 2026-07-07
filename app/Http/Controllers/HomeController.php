<?php

namespace App\Http\Controllers;

use App\Services\StatisticsService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private StatisticsService $statisticsService
    ) {}

    public function index(): View
    {
        $statistics = $this->statisticsService->getActive();
        return view('pages.home', compact('statistics'));
    }
}
