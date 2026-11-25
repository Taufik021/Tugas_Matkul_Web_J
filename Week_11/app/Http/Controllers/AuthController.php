<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials.'], 401);
        }

        $issuedAt = now()->timestamp;
        $token = JWT::encode([
            'iss' => config('app.url'),
            'iat' => $issuedAt,
            'exp' => $issuedAt + 3600,
            'sub' => (string) $user->getKey(),
        ], $this->signingKey(), 'HS256');

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }

    private function signingKey(): string
    {
        $key = config('app.key');

        if (! is_string($key) || $key === '') {
            throw new RuntimeException('The application key must be configured to sign JWTs.');
        }

        if (str_starts_with($key, 'base64:')) {
            $decodedKey = base64_decode(substr($key, 7), true);

            if ($decodedKey === false || $decodedKey === '') {
                throw new RuntimeException('The application key is not valid base64.');
            }

            return $decodedKey;
        }

        return $key;
    }
}
