<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Providers\UserServiceProvider;
use Illuminate\Http\Response;



class UserController extends Controller
{
    private $userService;
    
    public function __construct(UserServiceProvider $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->userService->index()
        ]);
        
    }

    public function store(UserRequest $request) 
    {
        $data = $request->validated();

        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $phone =$data['phone'];
        $roleId = $data['role_id'];
        $planningId =$data['planning_id'];

        $result = $this->userService->store($name,$email, $password,$phone,$roleId,$planningId);
        return 'Created successfully!';
    }

    
    public function show($id)
    {
        return response()->json([
            'data' => $this->userService->show($id)
        ]);
    }

    
    public function update(UserRequest $request, $id)
    {
        $data = $request->validated();

        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $phone =$data['phone'];
        $roleId = $data['role_id'];
        $planningId =$data['planning_id'];


        $this->userService->update($id, $name, $email, $password,$phone,$roleId,$planningId);
        return 'Updated successfully!';
    }

    
    public function destroy($id)
    {
        $this->userService->delete($id);
        return response()->json()
        ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }

   
}