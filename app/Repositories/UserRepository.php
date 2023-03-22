<?php

namespace App\Repositories\UserRepository;

use App\Repositories\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    public function allUsers()
    {
        return User::latest()->paginate(15);
    }

    public function storeUser($userData)
    {
        return User::create();
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
    }
}
