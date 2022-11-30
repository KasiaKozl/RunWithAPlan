<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Providers\TrainingServiceProvider;
use Illuminate\Http\Request;

//Intermediate layer between repository and and controller to handle logic
class TrainingController extends Controller
{

    private $trainingService; 
    
    public function __construct(TrainingServiceProvider $trainingService)
    {
        $this->trainingService = $trainingService;
    }

//CRUD functions

//Show all 
    public function index()
    {
        return response()->json([
            'data' => $this->trainingService->index()
        ]);
        
    }

//Create new model instance, validate introduced data and perform store 
    public function store(Request $request) 
    {
        $data = new Training();

        $data->level = $request->get('level');
        $data->distance = $request->get('distance');
        $data->time = $request->get('time');
        $data->file_name = $request->get('file_name');

        $data->save();
   
        session()->flash('status', 'Created successfully!');
        return back();
    }

//Get specific data provided id
    public function show($level, $distance, $time)
    {
        return response()->json([
            'data' => $this->trainingService->show($level, $distance, $time)
            
        ]);
    }

   

//Create new model instance, validate introduced data and perform update given the id   
    public function update(Request $request, $id)
    {
        $data = Training::findOrFail($id);

        $data->level = $request->get('level');
        $data->distance = $request->get('distance');
        $data->time = $request->get('time');
        $data->file_name = $request->get('file_name');

        $data->save();
   
        session()->flash('status', 'Updated successfully!');
        return back();
    }

//Delete specific data   
    public function destroy($id)
    {
        $this->trainingService->delete($id);
        
        session()->flash('status', 'Deleted successfully!');
        return back();
    }
}