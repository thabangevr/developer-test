<?php

namespace App\Repositories\Interfaces;

interface UserInterface
{
    public function allUsers();
    public function storeUser($userData);
    public function deleteUser($userId);
}