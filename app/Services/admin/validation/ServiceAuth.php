<?php

namespace App\Services\admin\validation;

use Illuminate\Support\Facades\Validator;

class ServiceAuth
{
    public function authValidation($formData)
    {
        return Validator::make($formData, [
            'email' => 'required|email',
            'password' => 'required|min:4',
        ], [
            'email.required' => 'وارد کردن ایمیل الزامی است.',
            'email.email' => 'فرمت ایمیل معتبر نیست.',
            'password.required' => 'وارد کردن رمز عبور الزامی است.',
            'password.min' => 'رمز عبور باید حداقل ۶ کاراکتر باشد.',
        ]);
    }
}
