<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Api\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\Api\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Регистрация
    public function register(RegisterRequest $request) {
        // Извлечение role_id для роли 'Пользователь'
        $role_id = Role::where('code', 'user')->first()->id;

        // Извлекаем валидированные данные
        $validated = $request->validated();

        // Создаём нового пользователя
        $user = User::create([... $validated, 'role_id' => $role_id]);

        // Создание токена для пользователя
        $token = $user->createToken('token')->plainTextToken;

        // Возвращаем ответ с токеном
        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
        ])->setStatusCode(201);
    }

    // Авторизация
    public function login(Request $request) {
        if (!Auth::attempt($request->only('login', 'password'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = Auth::user()->createToken('token')->plainTextToken;

        return response()->json([$token]);
    }

    // Выход
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
