<?php

namespace App\Services;

use App\Repositories\Interfaces\AuthRepositoryInterface;

class AuthService
{
    public function __construct(
      private AuthRepositoryInterface $authRepository
    ) {}

    public function login(array $credentials): bool
    {
        return $this->authRepository->login($credentials);
    }
}
