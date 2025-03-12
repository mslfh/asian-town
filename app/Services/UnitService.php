<?php

namespace App\Services;

use App\Contracts\UnitRepositoryInterface;

class UnitService
{
    protected $unitRepository;

    public function __construct(UnitRepositoryInterface $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    public function getAllUnits()
    {
        return $this->unitRepository->getAllUnits();
    }

    public function getUnitById($id)
    {
        return $this->unitRepository->getUnitById($id);
    }

    public function createUnit(array $data)
    {
        return $this->unitRepository->createUnit($data);
    }

    public function updateUnit($id, array $data)
    {
        return $this->unitRepository->updateUnit($id, $data);
    }

    public function deleteUnit($id)
    {
        return $this->unitRepository->deleteUnit($id);
    }
}
