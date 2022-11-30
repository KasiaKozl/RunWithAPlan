<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanningRequest;
use App\Providers\PlanningServiceProvider;

class PlanningController extends Controller
{

    private $planningService; 
    
    public function __construct(PlanningServiceProvider $planningService)
    {
        $this->planningService = $planningService;
    }

//CRUD functions

//Show all
    public function index()
    {
        return response()->json([
            'data' => $this->planningService->index()
        ]);
        
    }

//Save, first validate entered data than perform store
    public function store(PlanningRequest $request) 
    {
        $data = $request->validated();

        $name = $data['name'];

        $result = $this->planningService->store($name);

        session()->flash('status', 'Created successfully!');
        return back();
    }

    
//Show specific data given the id
    public function show($id)
    {
        return response()->json([
            'data' => $this->planningService->show($id)
        ]);
    }

//Save, first validate entered data than perform update
    public function update(PlanningRequest $request, $id)
    {
        $data = $request->validated();

        $name = $data['name'];

        $this->planningService->update($id, $name);

        session()->flash('status', 'Updated successfully!');
        return back();
    }

//Delete specific data    
    public function destroy($id)
    {
        $this->planningService->delete($id);

        session()->flash('status', 'Deleted successfully!');
        return back();
    }
}