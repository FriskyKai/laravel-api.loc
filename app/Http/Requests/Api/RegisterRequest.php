<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends ApiRequest
{
    // Правило авторизации
    public function authorize(): bool
    {
        return true;
    }

    // Правила валидации
    public function rules(): array
    {
        return [
            'surname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'patronymic' => 'nullable|string|max:255',
            'sex' => 'required|boolean',
            'birthday' => 'required|date:Y-m-d',
            'login' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|max:255',
        ];
    }

    // Кастомные сообщения об ошибках
    public function messages(): array {
        return [
            'surname.required' => 'Фамилия обязательна для заполнения',
            'name.required' => 'Имя обязательно для заполнения',
            'surname.max' => 'Фамилия должна состоять максимум из 255 символов',
            'name.max' => 'Имя должно состоять максимум из 255 символов',
            'patronymic.max' => 'Отчество должно состоять максимум из 255 символов',
            'birthday.required' => 'Дата рождения обязательна для заполнения',
            'birthday.date' => 'Дата рождения должна быть в формате YYYY-MM-DD',
            'login.required' => 'Логин обязателен для заполнения',
            'email.required' => 'Почта обязательна для заполнения',
            'password.required' => 'Пароль обязателен для заполнения',
            'login.max' => 'Логин должен состоять максимум из 255 символов',
            'email.max' => 'Почта должна состоять максимум из 255 символов',
            'password.max' => 'Пароль должен состоять максимум из 255 символов',
            'login.unique' => 'Такой логин уже существует',
            'email.unique' => 'Данная почта уже используется другим пользователем',
            'sex.required' => 'Пол обязателен для заполнения',
            'sex.boolean' => 'Введите: 0 - если женский, 1 - если мужской',
            'email.email' => 'Поле электронной почты должно быть действительным адресом электронной почты',
        ];
    }
}
