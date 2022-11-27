<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingRequest;
use App\Providers\TrainingServiceProvider;
use Illuminate\Http\Response;



class TrainingController extends Controller
{

    private $trainingService; 
    
    public function __construct(TrainingServiceProvider $trainingService)
    {
        $this->trainingService = $trainingService;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->trainingService->index()
        ]);
        
    }

    public function store(TrainingRequest $request) 
    {
        $data = $request->validated();

        $level = $data['level'];
        $distance = $data['distance'];
        $time = $data['time'];
        $fileName = $data['file_name'];

        $result = $this->trainingService->store($level, $distance, $time, $fileName);
        return 'Created successfully!';
    }

    
    public function show($level, $distance, $time)
    {
        return response()->json([
            'data' => $this->trainingService->show($level, $distance, $time)
        ]);
    }

    
    public function update(TrainingRequest $request, $id)
    {
        $data = $request->validated();

        $level = $data['level'];
        $distance = $data['distance'];
        $time = $data['time'];
        $fileName = $data['file_name'];

        $this->trainingService->update($id, $level, $distance, $time, $fileName);
        return 'Updated successfully!';
    }

    
    public function destroy($id)
    {
        $this->trainingService->delete($id);
        return response()->json()
        ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }

   
}