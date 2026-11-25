<?php

namespace Tests\Feature;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_and_receive_a_valid_jwt(): void
    {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => 'password',
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'user@example.com',
            'password' => 'password',
        ])->assertOk()
            ->assertJsonStructure(['access_token', 'token_type'])
            ->assertJsonPath('token_type', 'bearer');

        $claims = JWT::decode($response->json('access_token'), new Key($this->signingKey(), 'HS256'));

        $this->assertSame((string) $user->getKey(), $claims->sub);
        $this->assertGreaterThan(time(), $claims->exp);
    }

    public function test_login_fails_with_an_incorrect_password(): void
    {
        User::factory()->create(['email' => 'user@example.com']);

        $this->postJson('/api/login', [
            'email' => 'user@example.com',
            'password' => 'wrong-password',
        ])->assertUnauthorized()
            ->assertExactJson(['message' => 'Invalid credentials.']);
    }

    public function test_login_fails_when_the_user_does_not_exist(): void
    {
        $this->postJson('/api/login', [
            'email' => 'missing@example.com',
            'password' => 'password',
        ])->assertUnauthorized()
            ->assertExactJson(['message' => 'Invalid credentials.']);
    }

    private function signingKey(): string
    {
        $key = config('app.key');

        return str_starts_with($key, 'base64:')
            ? base64_decode(substr($key, 7), true)
            : $key;
    }
}
