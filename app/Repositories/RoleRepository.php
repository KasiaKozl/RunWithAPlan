<?php

namespace App\Repositories;

use App\Models\Role;

// Crud functions that can be performed on given model
class RoleRepository {

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

public function updateRole($roleId, array $newData) 
{
    return Role::whereId($roleId)->update($newData);
}

public function deleteRole($roleId)
{
    return Role::destroy($roleId);
}

public function showRoles()
{
    return Role::all();
}

public function findOrFail(int $roleId): Role
{
        return $this->model->findOrFail($roleId);
}

public function createRole(array $data)
{
    return Role::create($data);
}

}