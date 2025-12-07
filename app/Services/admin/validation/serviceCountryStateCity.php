<?php

namespace App\services\admin\validation;

use Illuminate\Support\Facades\Validator;

class serviceCountryStateCity
{
    public function countryValidation($formData)
    {
        return Validator::make($formData, [
            'name' => 'required|max:50'
        ], [
            'name.required' => 'نام کشور ضرروری هست',
            'name.max' => 'لظفا کمتر از 50 کاراکتر استفاده کنید'
        ]);
    }

    public function stateValidation($formData)
    {
        return Validator::make($formData,[
            'name' => 'required|min:2|max:30|unique:states,name',
            'country' => 'required|exists:countries,id|string'
        ],[
            '*.required' => 'این فیلد ضرروری هست!!',
            '*.min' => 'لطفا بیشتر از 2 کارکتر وارد کنید!!',
            '*.max' => 'لطفا کمتر از 30 کاراکتر وارد کنید!!',
            '*.string' => 'مقدار وارد شده غیر مجازه!!',
            'name.unique' => 'این نام قبلا استفاده شده',
            '*.exists' => 'این فیلد ضرروری هست!!',

        ]);
    }

    public function cityValidation($formData)
    {
        return Validator::make($formData,[
            'name' => 'required|min:2|max:30|unique:cities,name' ,
            'state' => 'required|exists:states,id'
        ],[
            '*.required' => 'این فیلد ضرروری هست',
            '*.min' => 'لطفا بیشتر از 2 کاراکتر وارد کنید',
            '*.max' => 'لطفا کمتر از 3 کاراکتر وارد کنید',
            'name.unique' => 'این نام قبلا استفاده شده',
            'state.exists' => 'این گزینه نا معتبر هست',
        ]);
    }
}
