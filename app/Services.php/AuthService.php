<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\TenantRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthService
{
    protected UserRepository $userRepo;
    protected TenantRepository $tenantRepo;

    public function __construct(UserRepository $userRepo, TenantRepository $tenantRepo)
    {
        $this->userRepo = $userRepo;
        $this->tenantRepo = $tenantRepo;
    }

    public function register(array $data)
    {
        // Validate here
        $validator = Validator::make($data, [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $defaultTenant = $this->tenantRepo->getDefaultTenant();

        $userData = [
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'tenant_id' => $defaultTenant->id,
        ];

        $user = $this->userRepo->create($userData);
        $user->assignRole('user');

        return $user;
    }
}
