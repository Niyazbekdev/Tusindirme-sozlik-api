<?php

namespace App\Http\Controllers;

use App\Services\Auth\LoginAdmin;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        try {
            [$user, $token, $role] = app(LoginAdmin::class)->execute($request->all());
            return response()->json([
                'data' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $role,
                    'token' => $token,
                ]
            ]);
        }catch (ValidationException $exception){
            return $exception->validator->errors()->all();
        }
    }
}
