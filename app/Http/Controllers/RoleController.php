<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Providers\RoleServiceProvider;


//Intermediate layer between repository and and controller to handle logic
class RoleController extends Controller
{
    private $roleService;
    public function __construct(RoleServiceProvider $roleService)
    {
        $this->roleService = $roleService;
    }

//CRUD functions

//Show all
    public function index()
    {
        return response()->json([
            'data' => $this->roleService->index()
        ]);
        
    }

//Validate introduced data and perform store 
    public function store(RoleRequest $request) 
    {
        $data = $request->validated();

        $name = $data['name'];

        $result = $this->roleService->store($name);
        
        session()->flash('status', 'Created successfully!');
        return back();
    }

//Show specific data by id
    public function show($id)
    {
        return response()->json([
            'data' => $this->roleService->show($id)
        ]);
    }

////Validate introduced data and perform store 
    public function update(RoleRequest $request, $id)
    {
        $data = $request->validated();

        $name = $data['name'];

        $this->roleService->update($id, $name);
        
        session()->flash('status', 'Updated successfully!');
        return back();
    }

//Delete specific data
    public function destroy($id)
    {
        $this->roleService->delete($id);
        
        session()->flash('status', 'Deleted successfully!');
        return back();
    } 
}