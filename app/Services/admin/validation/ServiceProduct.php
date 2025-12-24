<?php

namespace App\Services\admin\validation;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ServiceProduct
{
    public function productValidation($formData, $photos, $coverImage, $productId)
    {
        $formData['coverImage'] = $coverImage;
        $formData['photos'] = $photos;
        return Validator::make($formData, [
//            'photos'   => 'required|array|min:1',
            'photos.*' => 'image|mimes:png,jpg,jpeg,webp,gif|max:2048',
            'name' => ['required', 'min:10', 'max:255', Rule::unique('products', 'name')->ignore($productId)],
            'slug' => 'required|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required',
            'short_description' => 'nullable',
            'long_description' => 'nullable',
            'category' => 'required|exists:categories,id',
            'p_code' => 'nullable|unique:products,p_code',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'discount' => 'nullable|integer|min:0|max:100',
            'featured' => 'nullable|boolean',
            'discount_duration' => 'nullable|date',
            'seller' => 'required|exists:sellers,id',
            'coverImage' => 'required',
        ], [
//            'photos.required' => 'حداقل یک تصویر الزامی است.',
//            'photos.array' => 'فرمت تصاویر ارسالی معتبر نیست.',
//            'photos.min' => 'حداقل یک تصویر انتخاب کنید.',

            'photos.*.image' => 'هر فایل باید تصویر باشد.',
            'photos.*.mimes' => 'فرمت تصویر باید png، jpg، jpeg، webp یا gif باشد.',
            'photos.*.max' => 'حجم هر تصویر نباید بیشتر از ۲ مگابایت باشد.',

            'name.required' => 'نام محصول الزامی است.',
            'name.max' => 'نام محصول نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'name.min' => 'نام محصول باید بیشتر از 10 کاراکتر باشد',
            'name.unique' => 'این نام محصول قبلا استفاده شده',

            'slug.required' => 'نامک محصول الزامی است.',
            'slug.max' => 'نامک محصول نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'slug.unique' => 'نامک وارد شده قبلاً استفاده شده است.',

            'meta_title.required' => 'عنوان متا الزامی است.',
            'meta_title.max' => 'عنوان متا نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'meta_description.required' => 'توضیحات متا الزامی است.',

            'category.required' => 'دسته‌بندی محصول الزامی است.',
            'category.exists' => 'دسته‌بندی انتخاب شده معتبر نیست.',

            'p_code.unique' => 'کد محصول وارد شده قبلاً استفاده شده است.',

            'price.required' => 'قیمت محصول الزامی است.',
            'price.integer' => 'قیمت باید عدد صحیح باشد.',
            'price.min' => 'قیمت نمی‌تواند منفی باشد.',

            'stock.required' => 'موجودی محصول الزامی است.',
            'stock.integer' => 'موجودی باید عدد صحیح باشد.',
            'stock.min' => 'موجودی نمی‌تواند منفی باشد.',

            'discount.integer' => 'تخفیف باید عدد صحیح باشد.',
            'discount.min' => 'تخفیف نمی‌تواند منفی باشد.',
            'discount.max' => 'تخفیف نمی‌تواند بیشتر از ۱۰۰٪ باشد.',

            'featured.boolean' => 'ویژگی محصول باید صحیح یا غلط باشد.',

            'discount_duration.date' => 'مدت زمان تخفیف باید یک تاریخ معتبر باشد.',

            'seller.required' => 'شناسه فروشنده الزامی است.',
            'seller.exists' => 'فروشنده انتخاب شده معتبر نیست.',

            'coverImage.required' => 'یک کاور عکس لطفا انتخاب کنید',
        ]);
    }

    public function featureValidation($data)
    {
        return Validator::make($data, [

            'featureIds' => ['required', 'array'],
            'featureIds.*' => ['required', 'integer', 'exists:category_features,id'],

            'detailIds' => ['required', 'array'],
            'detailIds.*' => ['required', 'integer', 'exists:category_feature_details,id'],

            'valueIds' => ['required', 'array'],
            'valueIds.*' => ['required', 'string'], // اگر عدد است integer بگذار

        ], [

            'featureIds.required' => 'جزییات الزامی هستند.',
            'featureIds.array' => 'فرمت جزییات نادرست است.',
            'featureIds.*.exists' => 'جزییات انتخاب شده معتبر نیست.',

            'detailIds.required' => 'جزییات الزامی هستند.',
            'detailIds.array' => 'فرمت جزییات نادرست است.',
            'detailIds.*.exists' => 'جزییات انتخاب شده معتبر نیست.',

            'valueIds.required' => 'مقدار ویژگی الزامی است.',
            'valueIds.array' => 'فرمت مقدار ویژگی نادرست است.',
            'valueIds.*.required' => 'برای هر ویژگی باید مقدار انتخاب شود.',

        ]);

    }

    public function filterValidation($formData)
    {
        return Validator::make($formData,[
            'value' => 'required|max:200'
        ],[
            'value.required' => 'لطفا مقدار را پر کنید',
            'value.max' => 'لطفا بیشتر از 200 کاراکتر استفاده نکنید',
        ]);
    }
}
