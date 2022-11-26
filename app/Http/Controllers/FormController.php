<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormsRequest;
use App\Providers\FormServiceProvider;
use Illuminate\Http\Response;



class FormController extends Controller
{
    private $formService;
    
    function __construct(FormServiceProvider $formService)
    {
        $this->formService = $formService;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->formService->index()
        ]);
        
    }

    public function store(FormsRequest $request) 
    {
        $data = $request->validated();

        $name = $data['name'];
        $userId= $data['user_id'];
        $level= $data['level'];
        $time=$data['time'];
        $distance=$data['distance'];

        $result = $this->formService->store($name, $userId, $level, $time, $distance);
        return 'Created successfully!';
    }

    
    public function show($id)
    {
        return response()->json([
            'data' => $this->formService->show($id)
        ]);
    }

    
    public function update(FormsRequest $request, $id)
    {
        $data = $request->validated();

        $name = $data['name'];
        $userId= $data['user_id'];
        $level= $data['level'];
        $time=$data['time'];
        $distance=$data['distance'];

        $this->formService->update($id, $name, $userId, $level, $time, $distance);
        return 'Updated successfully!';
    }

    
    public function destroy($id)
    {
        $this->formService->delete($id);
        return response()->json()
        ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }

   
}