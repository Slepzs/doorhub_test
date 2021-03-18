<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Support\Str;

class LoginTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRequireEmailAndPassword()
    {
        $payload = [];
        $this->json('POST', 'api/login', $payload)
            ->assertStatus(422)
            ->assertJsonFragment([
                    "email" => [
                        "The email field is required."
                    ],
                      "password" => [
                        "The password field is required."
                    ]
              ]
            );

        //$response = $this->get('/');
        // $response->assertStatus(200);
    }

    public function testUserLoginsSuccesfully() {
        $user = User::factory()->create([
            'firstName' => 'JohnTest',
            'lastName' => 'Case',
            'username' => 'Brillant Idea',
            'email' => $this->faker->email,
            'password' => Hash::make('password'),
        ]);

        $payload = ['firstName' => 'JohnTest', 'lastName' => 'Case', 'email' => 'doorHubTest@gmail.com', 'password' => 'password'];

        $this->json('POST', 'api/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'firstName',
                    'lastName',
                    'username',
                    'email',
                    'created_at',
                    'updated_at',
                    'api_token',
                ],
            ]);


    }
}
