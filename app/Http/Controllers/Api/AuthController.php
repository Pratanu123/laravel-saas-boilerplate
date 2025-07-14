<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected AuthService $authService;
    public function register(Request $request)
    {
        $user = $this->authService->register($request->all());

        return response()->json([
            'message' => 'User registered successfully',
            'user'    => $user
        ], 201);
    }


    public function login(Request $request)
    {
        $http = new \GuzzleHttp\Client;

        $response = $http->post(config('app.url') . '/oauth/token', [
            'form_params' => [
                'grant_type'    => 'password',
                'client_id'     => config('passport.client_id'),
                'client_secret' => config('passport.client_secret'),
                'username'      => $request->email,
                'password'      => $request->password,
                'scope'         => '',
            ],
        ]);

        return response()->json(json_decode((string) $response->getBody(), true));
    }
}
