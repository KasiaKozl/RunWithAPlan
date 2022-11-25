<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use Illuminate\Support\Collection;

use App\Models\User;

class UserServiceProvider 
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(): Collection
    {
        return $this->userRepository->showUsers();
    }

    public function store($data): User
    {
        return $this->userRepository->createUser($data);
    }

    public function show($id)
    {
        return $this->userRepository->findOrFail($id);
    }

    public function update($id, $newData)
    {
        return $this->userRepository->updateUser($id, $newData);
    }

    public function delete($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}
