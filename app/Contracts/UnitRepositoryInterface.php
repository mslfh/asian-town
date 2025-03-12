<?php

namespace App\Contracts;

interface UnitRepositoryInterface
{
    public function getAllUnits();
    public function getUnitById($id);
    public function createUnit(array $data);
    public function updateUnit($id, array $data);
    public function deleteUnit($id);
}
