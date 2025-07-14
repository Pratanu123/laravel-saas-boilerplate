<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Assign a default tenant (for now)
        $tenant = \App\Models\Tenant::where('slug', $request->tenant_slug)->firstOrFail();
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'tenant_id' => $tenant->id, // Assign tenant_id here
        ]);

        // Optionally assign a default role
        $user->assignRole('user');

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
