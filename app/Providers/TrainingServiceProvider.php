<?php

namespace App\Providers;

use App\Repositories\TrainingRepository;
use Illuminate\Support\Collection;

use App\Models\Training;

class TrainingServiceProvider 
{
    private $trainingRepository;

    public function __construct(TrainingRepository $trainingRepository)
    {
        $this->trainingRepository = $trainingRepository;
    }

    public function index(): Collection
    {
        return $this->trainingRepository->showTrainings();
    }

    public function store($data): Training
    {
        return $this->trainingRepository->createTraining($data);
    }

    public function show($level, $distance, $time)
    {
        return $this->trainingRepository->getSpecificTraining($level, $distance, $time);
    }

    public function update($id, $newData)
    {
        return $this->trainingRepository->updateTraining($id, $newData);
    }

    public function delete($id)
    {
        return $this->trainingRepository->deleteTraining($id);
    }
}
