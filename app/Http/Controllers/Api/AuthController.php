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
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user);
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
