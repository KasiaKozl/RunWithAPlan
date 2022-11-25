<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Providers\RoleServiceProvider;
use Illuminate\Http\Response;



class RoleController extends Controller
{
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
        return 'Created successfully!';
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
        return 'Updated successfully!';
    }

    
    public function destroy($id)
    {
        $this->roleService->delete($id);
        return response()->json()
        ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }

   
}