<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Providers\QuoteServiceProvider;
use Illuminate\Http\Response;



class QuoteController extends Controller
{
    private $quoteService;
    public function __construct(QuoteServiceProvider $quoteService)
    {
        $this->quoteService = $quoteService;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->quoteService->index()
        ]);
        
    }

    public function store(QuoteRequest $request) 
    {
        $data = $request->validated();

        $name = $data['name'];

        $result = $this->quoteService->store($name);
        return 'Created successfully!';
    }

    
    public function show($id)
    {
        return response()->json([
            'data' => $this->quoteService->show($id)
        ]);
    }

    
    public function update(QuoteRequest $request, $id)
    {
        $data = $request->validated();

        $name = $data['name'];

        $this->quoteService->update($id, $name);
        return 'Updated successfully!';
    }

    
    public function destroy($id)
    {
        $this->quoteService->delete($id);
        return response()->json()
        ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }

   
}