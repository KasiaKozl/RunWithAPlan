<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository {

    public function __construct(User $model)
    {
        $this->model = $model;
    }

public function updateUser($userId, array $newData) 
{
    return User::whereId($userId)->update($newData);
}

public function deleteUser($userId)
{
    return User::destroy($userId);
}

public function showUsers()
{
    return User::all();
}

public function findOrFail(int $userId): User
{
        return $this->model->findOrFail($userId);
}

public function createUser(array $data)
{
    return User::create($data);
}

}