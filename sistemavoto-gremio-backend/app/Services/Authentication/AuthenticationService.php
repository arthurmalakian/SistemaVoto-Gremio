<?php

namespace App\Services\Authentication;

interface AuthenticationService
{
    public function login($email,$password);
    public function logout();
    public function sendResetPasswordMail($email);
}
