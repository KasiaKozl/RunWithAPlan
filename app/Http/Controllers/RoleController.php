<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Providers\RoleServiceProvider;
use Illuminate\Http\Response;



class RoleController extends Controller
{
    private $roleService;
    public function __construct(RoleServiceProvider $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->roleService->index()
        ]);
        
    }

    public function store(RoleRequest $request) 
    {
        $data = $request->validated();

        $name = $data['name'];

        $result = $this->roleService->store($name);
        
        session()->flash('status', 'Created successfully!');
        return back();
    }

    
    public function show($id)
    {
        return response()->json([
            'data' => $this->roleService->show($id)
        ]);
    }

    
    public function update(RoleRequest $request, $id)
    {
        $data = $request->validated();

        $name = $data['name'];

        $this->roleService->update($id, $name);
        
        session()->flash('status', 'Updated successfully!');
        return back();
    }

    
    public function destroy($id)
    {
        $this->roleService->delete($id);
        
        session()->flash('status', 'Deleted successfully!');
        return back();
    }

   
}