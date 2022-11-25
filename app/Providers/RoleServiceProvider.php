<?php

namespace App\Providers;

use App\Repositories\RoleRepository;
use Illuminate\Support\Collection;

use App\Models\Role;

class RoleServiceProvider 
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index(): Collection
    {
        return $this->roleRepository->showRoles();
    }

    public function store($data): Role
    {
        return $this->roleRepository->createRole($data);
    }

    public function show($id)
    {
        return $this->roleRepository->findOrFail($id);
    }

    public function update($id, $newData)
    {
        return $this->roleRepository->updateRole($id, $newData);
    }

    public function delete($id)
    {
        return $this->roleRepository->deleteRole($id);
    }
}

