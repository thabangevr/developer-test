<?php

namespace App\Repositories\Interfaces;

interface UserInterface
{
    public function allUsers();
    public function storeUser($user);
    public function deleteUser($userId);
}
