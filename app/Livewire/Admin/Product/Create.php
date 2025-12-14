<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSeller;
use App\Models\Seller;
use App\Models\SeoItem;
use App\Repository\admin\Product\ProductAdminRepositoryInterface;
use App\Services\admin\validation\ServiceProduct;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Component;
use Livewire\WithFileUploads;
use Monolog\Handler\IFTTTHandler;

class Create extends Component
{
    use WithFileUploads;
    public $categorys = [];
    public $photos = [];
    public $sellers = [];
    public $productId, $name, $slug, $meta_title, $meta_description, $price, $stock, $category, $seller;
    public $discount, $discount_duration, $featured,$coverImage = 0;
    private $repository;
    public function boot(ProductAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount()
    {
        $this->categorys = Category::query()->where('category_id', '!=', null)->get();
        $this->sellers = Seller::query()->get();
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name,'-',false);
    }

    public function submit($formData)
    {
        if (isset($formData['featured'])) {$formData['featured'] = true;}
        else {$formData['featured'] = false;}
        if ($formData['discount_duration'] == "") {$formData['discount_duration'] = null;}
        if ($formData['discount'] == "") {$formData['discount'] = null;}
        $service = new ServiceProduct();
        $service->productValidation($formData,$this->photos,$this->coverImage,$this->productId)->validate();
        $this->repository->submit($formData,$this->productId,$this->photos,$this->coverImage);
        $this->reset('name', 'slug', 'meta_title', 'meta_description', 'photos',
            'price', 'stock', 'category', 'seller', 'discount', 'discount_duration', 'featured');
        $this->resetValidation();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد');
        $this->productId = null;
    }

    public function setCoverImage($index)
    {
        $this->coverImage = $index;
        $this->dispatch('success','کاور شما تغغیر کد');
    }

    public function delete($index)
    {
        if ($index == $this->coverImage)
        {
            $this->coverImage = null;
        }
        array_splice($this->photos,$index,1);
    }


    public function render()
    {
        return view('livewire.admin.product.createProduct.index')->layout('layouts.admin.app');
    }
}
