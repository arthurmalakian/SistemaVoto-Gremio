<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\PasswordResetRequest;
use App\Services\Authentication\AuthenticationServiceImpl as AuthenticationService;


class AuthenticationController extends Controller
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AuthenticationService;
    }

    public function login(LoginRequest $request)
    {
        return $this->authService->login($request->email,$request->password);
    }

    public function logout()
    {
        return $this->authService->logout();
    }

    public function sendResetPasswordMail(PasswordResetRequest $request)
    {
        return $this->authService->sendResetPasswordMail($request->email);
    }
}
