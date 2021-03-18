<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    public function testsRegistersSuccessfully()
    {
        // remember to change email --- .. or use faker
        $payload = ['firstName' => 'JohnD','lastName' => 'Larsen','username' => 'Fiftheen','email' => 'xxaxax@io.com','password' => 'password', 'password_confirmation' => 'password'];

        $this->json('post', '/api/register', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'firstName',
                    'lastName',
                    'username',
                    'email',
                ],
            ]);
    }

    public function testsRequirePasswordConfirmation()
    {
        $payload = [
            'name' => 'Lars',
            'email' => 'doorhub@io.com',
            'password' => 'password',
        ];

        $this->json('post', '/api/register', $payload)
            ->assertStatus(422)
            ->assertJsonFragment([
                'password' => ['The password confirmation does not match.'],
            ]);
    }
}
