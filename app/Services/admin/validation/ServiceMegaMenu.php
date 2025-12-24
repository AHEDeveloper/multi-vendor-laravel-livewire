<?php

namespace App\Services\admin\validation;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ServiceMegaMenu
{

    public function categoryValidation($formData, $categoryId,$photo)
    {
        $formData['photo'] = $photo;
        return Validator::make($formData, [
            'name' => ['required', 'max:200', Rule::unique('mega_menu_categories','name')->ignore($categoryId)],
            'photo' => 'nullable|image|mimes:png,jpg,jpeg,webp,gif|max:2048',
        ], [
            'name.required' => 'لطفا نام دسته بندی مگا را پر کنید',
            'name.max' => 'لطفا برای نام بیشتر از 200 کاراکتر استفاده نکنید',
            'name.unique' => 'این نام دسته بندی قبلا استفاده شده',

             'photo.image' => 'هر فایل باید تصویر باشد.',
             'photo.mimes' => 'فرمت تصویر باید png، jpg، jpeg، webp یا gif باشد.',
             'photo.max' => 'حجم هر تصویر نباید بیشتر از ۲ مگابایت باشد.',
        ]);
    }

    public function featureValidation($formData,$featureId)
    {
        return Validator::make($formData, [
            'name' => ['required', 'max:200', Rule::unique('mega_menu_features','name')->ignore($featureId)],
        ], [
            'name.required' => 'لطفا نام دسته بندی مگا را پر کنید',
            'name.max' => 'لطفا برای نام بیشتر از 200 کاراکتر استفاده نکنید',
            'name.unique' => 'این نام دسته بندی قبلا استفاده شده',
        ]);
    }

}
