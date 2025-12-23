<?php

namespace App\Services\admin\validation;

use Illuminate\Support\Facades\Validator;

class ServiceProductSeller
{

    public function productSellerValidation($formData)
    {
        return Validator::make($formData,[
            'product' => 'required|exists:products,id',
            'price' => 'required|min:0',
            'stock' => 'required|integer|min:0',
        ],[
            'product.required' => 'دسته‌بندی محصول الزامی است.',
            'product.exists' => 'دسته‌بندی انتخاب شده معتبر نیست.',

            'price.required' => 'قیمت محصول الزامی است.',
            'price.min' => 'قیمت نمی‌تواند منفی باشد.',

            'stock.required' => 'موجودی محصول الزامی است.',
            'stock.integer' => 'موجودی باید عدد صحیح باشد.',
            'stock.min' => 'موجودی نمی‌تواند منفی باشد.',
        ]);
    }

}
