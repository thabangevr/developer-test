<?php

namespace App\Http\Controllers;;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public  function allUsers()
    {
        $users = $this->userRepository->allUsers();
        Log::debug(json_encode($users));
        return view('auth.create-user',compact('users'));
    }

    public function store(Request $request)
    {
        
    }
}

