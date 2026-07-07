<?php

namespace App\Repositories;

use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(array $credentials): bool
    {
        return Auth::attempt($credentials, true);
    }
}
