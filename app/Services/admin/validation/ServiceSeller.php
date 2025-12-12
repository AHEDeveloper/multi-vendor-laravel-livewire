<?php

namespace App\Services\admin\validation;

use Illuminate\Support\Facades\Validator;

class ServiceSeller
{

    public function sellerValidation($formData)
    {
        return Validator::make($formData,[
            'name'        => 'required|string|max:255',
            'shop_name'   => 'required|string|max:255',
            'mobile'      => ['required', 'regex:/^09\d{9}$/'],
            'email'       => 'required|email|max:255|unique:users,email',
            'password'    => 'required|string|min:6',
            'address'     => 'required|string|max:500',
            'description' => 'nullable|string',
        ],[
            'name.required'        => 'نام الزامی است.',
            'name.string'          => 'فرمت نام معتبر نیست.',
            'name.max'             => 'نام نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'shop_name.required'   => 'نام فروشگاه الزامی است.',
            'shop_name.string'     => 'فرمت نام فروشگاه معتبر نیست.',
            'shop_name.max'        => 'نام فروشگاه نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'mobile.required' => 'شماره موبایل الزامی است.',
            'mobile.regex'    => 'شماره موبایل باید با 09 شروع شود و دقیقاً ۱۱ رقم باشد.',

            'email.required'       => 'ایمیل الزامی است.',
            'email.email'          => 'ایمیل معتبر نیست.',
            'email.max'            => 'ایمیل نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'email.unique'         => 'این ایمیل قبلاً ثبت شده است.',

            'password.required'    => 'رمز عبور الزامی است.',
            'password.min'         => 'رمز عبور باید حداقل ۶ کاراکتر باشد.',

            'address.required'     => 'آدرس الزامی است.',
            'address.string'       => 'فرمت آدرس معتبر نیست.',
            'address.max'          => 'آدرس نباید بیشتر از ۵۰۰ کاراکتر باشد.',

            'description.string'   => 'توضیحات باید به صورت متن باشد.',
        ]);
    }

}
