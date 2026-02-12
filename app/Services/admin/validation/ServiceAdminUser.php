<?php

namespace App\Services\admin\validation;

use Illuminate\Support\Facades\Validator;

class ServiceAdminUser
{
    public function adminValidation($formData)
    {
        return Validator::make($formData, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'mobile' => 'required|regex:/^09[0-9]{9}$/|unique:admins,mobile',
            'selectedRoles' => 'required|array',
            'selectedRoles.*' => 'exists:roles,id',
            'selectedPermissions' => 'required|array',
            'selectedPermissions.*' => 'exists:permissions,id',
        ],[
            'name.required' => 'وارد کردن نام الزامی است.',
            'name.string'   => 'نام باید به صورت متن وارد شود.',
            'name.max'      => 'نام نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

            'email.required' => 'وارد کردن ایمیل الزامی است.',
            'email.email'    => 'فرمت ایمیل وارد شده معتبر نیست.',
            'email.unique'   => 'این ایمیل قبلاً ثبت شده است.',

            'mobile.required' => 'وارد کردن شماره موبایل الزامی است.',
            'mobile.regex'    => 'شماره موبایل باید با 09 شروع شده و 11 رقم باشد.',
            'mobile.unique'   => 'این شماره موبایل قبلاً ثبت شده است.',

            'selectedRoles.required' => 'حداقل یک نقش باید انتخاب شود.',
            'selectedRoles.array'    => 'نقش‌های انتخاب شده نامعتبر هستند.',
            'selectedRoles.*.exists' => 'یکی از نقش‌های انتخاب شده معتبر نیست.',

            'selectedPermissions.required' => 'حداقل یک دسترسی باید انتخاب شود.',
            'selectedPermissions.array'    => 'دسترسی‌های انتخاب شده نامعتبر هستند.',
            'selectedPermissions.*.exists' => 'یکی از دسترسی‌های انتخاب شده معتبر نیست.',
        ]);
    }

    public function generatePassword($length)
    {
        // کاراکترهای مختلف
        $numbers = '0123456789';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $symbols = '@!#$%^&*().+-=[]{}<>?,;';

// حداقل یک عدد، یک حرف کوچک، یک حرف بزرگ و یک سیمبل اضافه می‌کنیم
        $password = [
            $numbers[random_int(0, strlen($numbers) - 1)],
            $lowercase[random_int(0, strlen($lowercase) - 1)],
            $uppercase[random_int(0, strlen($uppercase) - 1)],
            $symbols[random_int(0, strlen($symbols) - 1)],
        ];
// کاراکترهای تصادفی دیگر اضافه می‌کنیم
        $allCharacters = $numbers . $lowercase . $uppercase . $symbols;
        while (count($password) < $length) {
            $char = $allCharacters[random_int(0, strlen($allCharacters) - 1)];

            // بررسی عدم کنار هم قرار گرفتن کاراکتر پشت سر هم
            if (count($password) > 0 && $password[count($password) - 1] === $char) {
                continue;
            }

            $password[] = $char;
        }

// مخلوط کردن کاراکترها
        shuffle($password);
        return implode('',$password);
    }
}
