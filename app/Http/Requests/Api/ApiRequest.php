<?php

namespace App\Http\Requests\Api;

use App\Exceptions\Api\ApiException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new ApiException('Ошибка валидации данных', 422, $validator->errors());
    }

    protected function failedAuthorization()
    {
        throw new ApiException('Forbidden for you', 403);
    }
}
