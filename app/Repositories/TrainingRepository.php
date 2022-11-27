<?php

namespace App\Repositories;

use App\Models\Training;

class TrainingRepository {

    public function __construct(Training $model)
    {
        $this->model = $model;
    }

public function updateTraining($trainingId, array $newData) 
{
    return Training::whereId($trainingId)->update($newData);
}

public function deleteTraining($trainingId)
{
    return Training::destroy($trainingId);
}

public function showTrainings()
{
    return Training::all();
}

public function findOrFail(int $trainingId): Training
{
        return $this->model->findOrFail($trainingId);
}

public function createTraining(array $data)
{
    return Training::create($data);
}

public function getSpecificTraining($level, $distance, $time){
    return Training::get($level, $distance, $time)
}

}