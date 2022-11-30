<?php

namespace App\Repositories;

use App\Models\Training;
use Illuminate\Support\Facades\DB;

// Crud functions that can be performed on given model
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
    return DB::table('trainings')
                ->where('level', '=', $level)
                ->where('distance', '=', $distance)
                ->where('time', '=', $time)
                ->get();
}

}