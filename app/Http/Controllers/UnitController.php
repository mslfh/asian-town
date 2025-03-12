<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitRequest;
use App\Services\UnitService;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;

class UnitController extends BaseController
{
    protected $unitService;

    public function __construct(UnitService $unitService)
    {
        $this->unitService = $unitService;
    }

    public function index()
    {
        $units = $this->unitService->getAllUnits();
        return Inertia::render('Units/Index', ['units' => $units]);
    }

    public function show($id)
    {
        $unit = $this->unitService->getUnitById($id);
        return Inertia::render('Units/Show', ['unit' => $unit]);
    }

    public function create()
    {
        return Inertia::render('Units/Create');
    }

    public function store(UnitRequest $request): RedirectResponse
    {
        $this->unitService->createUnit($request->all());
        return redirect()->route('units.index')->with('success', 'Unit created successfully.');
    }

    public function edit($id)
    {
        $unit = $this->unitService->getUnitById($id);
        return Inertia::render('Units/Edit', ['unit' => $unit]);
    }

    public function update(UnitRequest $request, $id): RedirectResponse
    {
        $this->unitService->updateUnit($id, $request->all());
        return redirect()->route('units.index')->with('success', 'Unit updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $this->unitService->deleteUnit($id);
        return redirect()->route('units.index')->with('success', 'Unit deleted successfully.');
    }
}
