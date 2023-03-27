<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    public function allUsers()
    {
        return User::all();
    }

    public function storeUser($userData)
    {
        return User::create($userData);
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
    }
}
