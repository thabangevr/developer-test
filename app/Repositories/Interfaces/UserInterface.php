<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserInterface
{
    public function allUsers();
    public function storeUser(User $user);
    public function deleteUser($userId);
}
