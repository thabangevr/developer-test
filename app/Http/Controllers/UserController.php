<?php

namespace App\Http\Controllers;;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\Redirect;

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
        return view('auth.create-user', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|unique:users',
            'position' => 'required',
            'password' => 'required|min:8',
        ]);

        $createUser = $this->userRepository->storeUser($validated);

        if ($createUser) {
            $response = [
                'data' => $createUser,
            ];
            return response($response, 201);
        } else {
            $response = [
                'data' => $createUser->error->massage,
            ];
            return response($response, 409);
        }
    }

    public function delete(Request $request)
    {
        $userId = $request->route('id');
        $deleteUser = $this->userRepository->deleteUser($userId);

        if ($deleteUser) {
            $response = [
                'data' => $deleteUser,
            ];
            return response($response, 200);
        } else {
            $response = [
                'data' => $deleteUser->error->massage,
            ];
            return response($response, 409);
        }
    }
}
