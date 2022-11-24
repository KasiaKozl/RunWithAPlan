<?php

namespace App\Repositories;

use App\Models\Planning;

class PlanningRepository {

    public function __construct(Planning $model)
    {
        $this->model = $model;
    }

public function updatePlanning($planningId, array $newName) 
{
    return Planning::whereId($planningId)->update($newName);
}

public function deletePlanning($planningId)
{
    return Planning::destroy($planningId);
}

public function showPlanning()
{
    return Planning::all();
}

public function findOrFail(int $planningId): Planning
{
        return $this->model->findOrFail($planningId);
}

public function createPlanning(string $name)
{
    return Planning::create($name);
}

}