<?php

namespace App\Services\admin\validation;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ServiceCategory
{
    public function categoryValidation($formData,$categoryId)
    {
        return Validator::make($formData, [
            'name'   => ['required','min:2','max:30',Rule::unique('categories', 'name')->ignore($categoryId)],
            'parent' => 'nullable|exists:categories,id',
            'photo'  => 'nullable|image|mimes:png,jpg,jpeg,gif,svg',
        ], [
            '*.required' => 'این فیلد ضروری است!',
            '*.min'      => 'لطفا بیشتر از 2 کاراکتر وارد کنید!',
            '*.max'      => 'لطفا کمتر از 30 کاراکتر وارد کنید!',
            '*.unique'   => 'این نام تکراری است!',
            '*.exists'   => 'این مقدار نامعتبر است!',
            '*.image'    => 'لطفا یک فایل عکس وارد کنید!',
            '*.mimes'    => 'لطفا از پسوندهای png, jpg, jpeg, gif, svg استفاده کنید!',
        ]);
    }

    public function featureValidation($formData,$featureId)
    {
        return Validator::make($formData,[
            'name' => ['required','min:2','max:30',Rule::unique('category_features','name')->ignore($featureId)]
        ],[
            'name.required' => 'این فیلد ضرروری هست!',
            'name.min' => 'لطفا بیشتر از 2 کاراکتر وارد کنید',
            'name.max' => 'لطفا بیشتر از 30 کاراکتر وارد کنید',
            'name.unique' => 'این نام تکراری هست'
        ]);
    }

    public function detailValidation($formData,$detailId)
    {
        return Validator::make($formData,[
            'name' => ['required','min:2','max:30',Rule::unique('category_feature_details','name')->ignore($detailId)]
        ],[
            'name.required' => 'این فیلد ضرروری هست!',
            'name.min' => 'لطفا بیشتر از 2 کاراکتر وارد کنید',
            'name.max' => 'لطفا بیشتر از 30 کاراکتر وارد کنید',
            'name.unique' => 'این نام تکراری هست'
        ]);
    }
}
