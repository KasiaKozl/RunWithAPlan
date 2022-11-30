<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanningRequest;
use App\Providers\PlanningServiceProvider;
use Illuminate\Http\Response;



class PlanningController extends Controller
{

    private $planningService; 
    
    public function __construct(PlanningServiceProvider $planningService)
    {
        $this->planningService = $planningService;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->planningService->index()
        ]);
        
    }

    public function store(PlanningRequest $request) 
    {
        $data = $request->validated();

        $name = $data['name'];

        $result = $this->planningService->store($name);

        session()->flash('status', 'Created successfully!');
        return back();
    }

    
    public function show($id)
    {
        return response()->json([
            'data' => $this->planningService->show($id)
        ]);
    }

    
    public function update(PlanningRequest $request, $id)
    {
        $data = $request->validated();

        $name = $data['name'];

        $this->planningService->update($id, $name);

        session()->flash('status', 'Updated successfully!');
        return back();
    }

    
    public function destroy($id)
    {
        $this->planningService->delete($id);

        session()->flash('status', 'Deleted successfully!');
        return back();
    }
}