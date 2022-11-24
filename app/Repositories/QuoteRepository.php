<?php

namespace App\Repositories;

use App\Models\Quote;

class QuoteRepository {

    public function __construct(Quote $model)
    {
        $this->model = $model;
    }

public function updateQuote($quoteId, array $newBody) 
{
    return Quote::whereId($quoteId)->update($newBody);
}

public function deleteQuote($quoteId)
{
    return Quote::destroy($quoteId);
}

public function showQuotes()
{
    return Quote::all();
}

public function findOrFail(int $quoteId): Quote
{
        return $this->model->findOrFail($quoteId);
}

public function createQuote(array $body)
{
    return Quote::create($body);
}

}