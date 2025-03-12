<?php

namespace App\Repositories;

use App\Contracts\UnitRepositoryInterface;
use App\Models\Unit;

class UnitRepository implements UnitRepositoryInterface
{
    public function getAllUnits()
    {
        return Unit::all();
    }

    public function getUnitById($id)
    {
        return Unit::findOrFail($id);
    }

    public function createUnit(array $data)
    {
        return Unit::create($data);
    }

    public function updateUnit($id, array $data)
    {
        $unit = Unit::findOrFail($id);
        $unit->update($data);
        return $unit;
    }

    public function deleteUnit($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return $unit;
    }
}
