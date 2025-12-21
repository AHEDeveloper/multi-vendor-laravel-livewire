<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Content extends Component
{
    public $productName,$product;
    public $longDescription,$shortDescription;
    public function mount(Product $product)
    {
        $this->product = $product;
        $this->productName = $product->name;
        $this->shortDescription = $product->short_description;
        $this->longDescription = $product->long_description;
    }

    public function submit($formData)
    {
        $validator = Validator::make($formData, [
            'short_description' => [
                'required',
                'min:10',
                'max:1500',
            ],
            'long_description' => [
                'required',
                'min:20',
            ],
        ], [
            'short_description.required' => 'وارد کردن معرفی کالا الزامی است.',
            'short_description.min' => 'معرفی کالا باید حداقل ۱۰ کاراکتر باشد.',
            'short_description.max' => 'معرفی کالا نمی‌تواند بیشتر از 1500 کاراکتر باشد.',

            'long_description.required' => 'وارد کردن توضیحات تخصصی الزامی است.',
            'long_description.min' => 'توضیحات تخصصی باید حداقل ۲۰ کاراکتر باشد.',
        ]);
        $validator->validate();
        $this->product->update([
            'short_description' => $formData['short_description'],
            'long_description' => $formData['long_description'],
        ]);
        session()->flash('message', 'عملیات با موفقیت انجام شد');
        return redirect(route('admin.product.index'));
    }

    public function render()
    {
        return view('livewire.admin.product.content')->layout('layouts.admin.app');
    }
}
