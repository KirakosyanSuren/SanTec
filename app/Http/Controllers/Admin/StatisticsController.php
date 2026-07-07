<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatisticRequest;
use App\Models\Statistic;
use App\Services\StatisticsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StatisticsController extends Controller
{

    public function __construct(
        private StatisticsService $statisticsService
    ) {}

    public function index(): View
    {
        $statistics = $this->statisticsService->getAll();
        return view('admin.statistics.index', compact('statistics'));
    }

    public function create(): View
    {
        return view('admin.statistics.create');
    }

    public function store(StatisticRequest $request): RedirectResponse
    {
        $this->statisticsService->store($request->validated());

        return redirect()
            ->route('admin.statistics.index')
            ->with('success', __('admin.messages.created'));
    }

    public function edit(string $lang, Statistic $statistic): View
    {
        return view('admin.statistics.edit', compact('statistic'));
    }

    public function update(StatisticRequest $request, string $lang, Statistic $statistic): RedirectResponse
    {
        $this->statisticsService->update($request->validated(), $statistic);

        return redirect()
            ->route('admin.statistics.index')
            ->with('success', __('admin.messages.updated'));
    }

    public function destroy(string $lang, Statistic $statistic): RedirectResponse
    {
        $this->statisticsService->destroy($statistic);

        return redirect()
            ->back()
            ->with('success', __('admin.messages.deleted'));
    }

    public function changeStatus(string $lang, Statistic $statistic): RedirectResponse
    {
        $this->statisticsService->changeStatus($statistic);

        return redirect()
            ->back()
            ->with('success', __('admin.messages.status_changed'));
    }
}
