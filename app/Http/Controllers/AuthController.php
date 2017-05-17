<?php

namespace App\Http\Controllers;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // verificacion de credenciales
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // manejo excepciones
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // enviar el token de auth
        return response()->json(compact('token'));
    }

    function register(Request $request) //hacer validaciones
    {
        $input = $request->all();
        $input['password'] = \Hash::make($input['password']);
        User::create($input);
        return response()->json(['result' => true]);
    }

    function getMe(Request $request)
    {
        $input = $request->all();

        $user = JWTAuth::parseToken()->authenticate();

        //$user = JWTAuth::toUser($input['token']);
        return response()->json($user);
    }
}
