<?php

namespace App\Providers;

use App\Repositories\PlanningRepository;
use Illuminate\Support\Collection;

use App\Models\Planning;

class PlanningServiceProvider 
{
    private $planningRepository;

    public function __construct(PlanningRepository $planningRepository)
    {
        $this->planningRepository = $planningRepository;
    }

    public function index(): Collection
    {
        return $this->planningRepository->showPlannings();
    }

    public function store($name): Planning
    {
        return $this->planningRepository->createPlanning($name);
    }

    public function show($id)
    {
        return $this->planningRepository->findOrFail($id);
    }

    public function update($id, $newName)
    {
        return $this->planningRepository->updatePlanning($id, $newName);
    }

    public function delete($id)
    {
        return $this->planningRepository->deletePlanning($id);
    }
}
