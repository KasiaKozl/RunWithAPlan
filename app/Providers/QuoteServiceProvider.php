<?php

namespace App\Providers;

use App\Repositories\QuoteRepository;
use Illuminate\Support\Collection;

use App\Models\Quote;

//Intermediate layer between repository and and controller to handle logic
class QuoteServiceProvider 
{
    private $quoteRepository;

    public function __construct(QuoteRepository $quoteRepository)
    {
        $this->quoteRepository = $quoteRepository;
    }

    public function index(): Collection
    {
        return $this->quoteRepository->showQuotes();
    }

    public function store($body): Quote
    {
        return $this->quoteRepository->createQuote($body);
    }

    public function show($id)
    {
        return $this->quoteRepository->findOrFail($id);
    }

    public function update($id, $body)
    {
        return $this->quoteRepository->updateQuote($id, $body);
    }

    public function delete($id)
    {
        return $this->quoteRepository->deleteQuote($id);
    }
}

