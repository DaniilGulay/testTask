<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_via_api(): void
    {
        $response = $this->postJson('/api/registration', [
            'email' => 'new-user@example.com',
            'password' => 'supersecret',
            'gender' => 'male',
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('user.email', 'new-user@example.com')
            ->assertJsonPath('user.gender', 'male');

        $this->assertDatabaseHas('users', [
            'email' => 'new-user@example.com',
            'gender' => 'male',
        ]);
    }

    public function test_profile_show_returns_user_data(): void
    {
        $user = User::factory()->create([
            'email' => 'profile@example.com',
            'gender' => 'female',
        ]);

        $response = $this->getJson('/api/profile/'.$user->id);

        $response
            ->assertOk()
            ->assertJsonPath('id', $user->id)
            ->assertJsonPath('email', 'profile@example.com')
            ->assertJsonPath('gender', 'female');
    }
}
