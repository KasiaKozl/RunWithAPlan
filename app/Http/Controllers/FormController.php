<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormsRequest;
use App\Providers\FormServiceProvider;

class FormController extends Controller
{
    private $formService;
    
    function __construct(FormServiceProvider $formService)
    {
        $this->formService = $formService;
    }

// CRUD  functions 


//Show all forms
    public function index()
    {
        return response()->json([
            'data' => $this->formService->index()
        ]);
        
    }


// Save in db new form data
//First validate the request, get data by key names from data array, perform store
    public function store(FormsRequest $request) 
    {
        $data = $request->validated();

        $name = $data['name'];
        $userId = $data['user_id'];
        $level = $data['level'];
        $time =$data['time'];
        $distance=$data['distance'];

        $result = $this->formService->store($name, $userId, $level, $time, $distance);
       
        session()->flash('status', 'Created successfully!');
        return back();
    }

    
// Show a specific form data
    public function show($id)
    {
        return response()->json([
            'data' => $this->formService->show($id)
        ]);
    }

    
//Update data given the id
//First validate the request, get data by key names from data array, perform update
    public function update(FormsRequest $request, $id)
    {
        $data = $request->validated();

        $name = $data['name'];
        $userId= $data['user_id'];
        $level= $data['level'];
        $time=$data['time'];
        $distance=$data['distance'];

        $this->formService->update($id, $name, $userId, $level, $time, $distance);

        session()->flash('status', 'Updated successfully!');
        return back();
    }

    
//Delete specific data
    public function destroy($id)
    {
        $this->formService->delete($id);
        
        session()->flash('status', 'Deleted successfully!');
        return back();
    }
}