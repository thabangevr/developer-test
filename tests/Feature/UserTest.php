<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class UserTest extends TestCase
{

    private $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

   

    public function test_get_all_users()
    {
        $users = $this->userRepository->allUsers();
        Log::debug(json_encode($users));
        $users->assertStatus(200);
    }
}
