<?php

namespace App\Services\Authentication;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationServiceImpl implements AuthenticationService
{

    //TODO fazer a response retornar o os dados de tipo de usuário e seu perfil.
    public function login($email,$password)
    {
        try{
            $user = User::where('email',$email)->first();
            if(!$user || !Hash::check($password, $user->password)){
                return response([
                    'message' => 'Dados de login inválidos.',
                    'data' => []
                ],401);
            }
            $token = $user->createToken('authtoken')->plainTextToken;
            return response([
                'message' => 'Usuário autenticado.',
                'data' => [
                    'user' => $user,
                    'token'=> $token
                ]
            ],200);
        }catch(\Exception $exception){
            return response([
                'message' => 'Erro no login.',
                'data' => []
            ],500);
        }
    }

    public function logout()
    {
        try{
            Auth::user()->tokens()->delete();
            return response([
                'message' => 'Deslogado com sucesso.',
                'data' => []
            ],200);
        }catch(\Exception $exception){
            return response([
                'message' => 'Erro ao deslogar.',
                'data' => []
            ],500);
        }
    }

    public function sendResetPasswordMail($email){}
}
