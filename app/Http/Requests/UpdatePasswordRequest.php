<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{8,}$/'],
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'The password must be at least 8 characters long and must contain at least one number, one special character (!@#$%^&*), and one capital letter. آپ کے پاس ورڈ میں 1 کیپٹل الفابیٹ 1 خصوصی حرف 1 نمبر ہونا چاہیے اور یہ کم از کم 8 حروف کا ہونا چاہیے۔',
        ];
    }
}
