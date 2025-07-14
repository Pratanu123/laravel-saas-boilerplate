<?php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getAllUsers()
    {
        return Cache::remember('users.all', now()->addMinutes(10), function () {
            return $this->userRepo->getAll();
        });
    }
}
