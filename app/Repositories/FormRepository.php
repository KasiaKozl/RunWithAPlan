<?php

namespace App\Repositories;

use App\Models\Form;

// Crud functions that can be performed on given model
class FormRepository {

    public function __construct(Form $model)
    {
        $this->model = $model;
    }

public function updateForm($formId, array $newData) 
{
    return Form::whereId($formId)->update($newData);
}

public function deleteForm($formId)
{
    return Form::destroy($formId);
}

public function showForms()
{
    return Form::all();
}

public function findOrFail(int $formId): Form
{
        return $this->model->findOrFail($formId);
}

public function createForm(array $data)
{
    return Form::create($data);
}

}