<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Providers\QuoteServiceProvider;

class QuoteController extends Controller
{
    private $quoteService;
    public function __construct(QuoteServiceProvider $quoteService)
    {
        $this->quoteService = $quoteService;
    }

// CRUD functions

//Get all
    public function index()
    {
        return response()->json([
            'data' => $this->quoteService->index()
        ]);
        
    }

//Save, first perform validation than store
    public function store(QuoteRequest $request) 
    {
        $data = $request->validated();

        $name = $data['name'];

        $result = $this->quoteService->store($name);

        session()->flash('status', 'Created successfully!');
        return back();
    }

    
//Show specific data by id
    public function show($id)
    {
        return response()->json([
            'data' => $this->quoteService->show($id)
        ]);
    }

//Save, first perform validation than update given the id
    public function update(QuoteRequest $request, $id)
    {
        $data = $request->validated();

        $name = $data['name'];

        $this->quoteService->update($id, $name);

        session()->flash('status', 'Updated successfully!');
        return back();
    }

// Delete specific data
    public function destroy($id)
    {
        $this->quoteService->delete($id);

        session()->flash('status', 'Deleted successfully!');
        return back();
    } 
}