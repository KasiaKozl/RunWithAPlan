<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingRequest;
use App\Models\Training;
use App\Providers\TrainingServiceProvider;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



class TrainingController extends Controller
{

    private $trainingService; 
    
    public function __construct(TrainingServiceProvider $trainingService)
    {
        $this->trainingService = $trainingService;
    }

//CRUD functions
    public function index()
    {
        return response()->json([
            'data' => $this->trainingService->index()
        ]);
        
    }

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

    
    public function show($level, $distance, $time)
    {
        return response()->json([
            'data' => $this->trainingService->show($level, $distance, $time)
            
        ]);
    }

   
    
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

    
    public function destroy($id)
    {
        $this->trainingService->delete($id);
        
        session()->flash('status', 'Deleted successfully!');
        return back();
    }
}