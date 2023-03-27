<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class UserTest extends TestCase
{


    /**
     * A basic feature test example.
     *
     * @return void
     */




    public function test_get_all_users()
    {
        $getUsers = $this->get('/');
        $getUsers->assertStatus(200);
    }

    public function test_create_user()
    {
        $user_data = [
            'name' => "Thabang",
            'surname' => "Masango",
            'email' => "thabang454@everlytic.com",
            'password' => "tHABA@123",
            'position' => "Trainer"
        ];
        $createUser = $this->post('/users/create', $user_data);
        $createUser->assertStatus(201);
        $this->get('/users/delete/' . $createUser->baseResponse->original['data']['id']);
    }


    public function test_delete_user()
    {
        $user_data = [
            'name' => "Thabang",
            'surname' => "Masango",
            'email' => "thabang45@everlytic.com",
            'password' => "tHABA@123",
            'position' => "Trainer"
        ];
        $createUser = $this->post('/users/create', $user_data);

        Log::debug($createUser->baseResponse->original['data']['id']);
        $deleteUser = $this->get('/users/delete/' . $createUser->baseResponse->original['data']['id']);
        $deleteUser->assertStatus(200);
    }
}
