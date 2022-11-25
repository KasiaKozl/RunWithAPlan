<?php

namespace App\Providers;

use App\Repositories\FormRepository;
use Illuminate\Support\Collection;

use App\Models\Form;

class FormServiceProvider 
{
    private $formRepository;

    public function __construct(FormRepository $formRepository)
    {
        $this->formRepository = $formRepository;
    }

    public function index(): Collection
    {
        return $this->formRepository->showForms();
    }

    public function store($data): Form
    {
        return $this->formRepository->createForm($data);
    }

    public function show($id)
    {
        return $this->formRepository->findOrFail($id);
    }

    public function update($id, $newData)
    {
        return $this->formRepository->updateForm($id, $newData);
    }

    public function delete($id)
    {
        return $this->formRepository->deleteForm($id);
    }
}
