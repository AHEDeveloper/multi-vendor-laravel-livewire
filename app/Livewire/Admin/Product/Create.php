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
use Illuminate\Support\Facades\File;
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
    public $discount, $discount_duration, $featured, $coverImage = 0, $product;
    private $repository;

    public function boot(ProductAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount()
    {
        if (isset($_GET['product']) && $_GET['product']) {
            $p_code = $_GET['product'];
            $this->product = $product = $this->repository->getProductByCode($p_code);
            $this->populateFormData($product);
        }
        $this->categorys = Category::query()->where('category_id', '!=', null)->get();
        $this->sellers = Seller::query()->get();
    }

    public function populateFormData($product)
    {
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->slug = $product->seoItem->slug;
        $this->meta_title = $product->seoItem->meta_title;
        $this->meta_description = $product->seoItem->meta_description;
        $this->price = $product->productSeller->price;
        $this->stock = $product->productSeller->stock;
        $this->category = $product->category_id;
        $this->seller = $product->productSeller->seller_id;
        $this->discount = $product->productSeller->discount;
        $this->discount_duration = \Carbon\Carbon::parse($product->productSeller->discount_duration)->format('Y-m-d');
        $this->featured = $product->productSeller->featured;
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name, '-', false);
    }

    public function submit($formData)
    {
        if (isset($formData['featured'])) {
            $formData['featured'] = true;
        } else {
            $formData['featured'] = false;
        }
        if ($formData['discount_duration'] == "") {
            $formData['discount_duration'] = null;
        }
        if ($formData['discount'] == "") {
            $formData['discount'] = null;
        }
        $service = new ServiceProduct();
        $service->productValidation($formData, $this->photos, $this->coverImage, $this->productId)->validate();
        $this->repository->submit($formData, $this->productId, $this->photos, $this->coverImage);
        $this->afterSubmit();
    }

    public function afterSubmit()
    {
        $this->reset('name', 'slug', 'meta_title', 'meta_description', 'photos',
            'price', 'stock', 'category', 'seller', 'discount', 'discount_duration', 'featured');
        $this->resetValidation();
        $this->flashSuccessMessage($this->productId);
        $this->productId = null;
        $this->redirect(route('admin.product.index'));
    }

    public function flashSuccessMessage($productId)
    {
        if ($productId)
        {
            session()->flash('message', 'محصول شما با موفقیت تغییر کرد ');
        }else{
            session()->flash('message', 'محصول شما با موفقیت ایجاد شد');

        }
    }

    public function setCoverImage($index)
    {
        $this->coverImage = $index;
        $this->dispatch('success', 'کاور شما تغغیر کد');
    }

    public function removePhoto($index)
    {
        if ($index == $this->coverImage) {
            $this->coverImage = null;
        }
        array_splice($this->photos, $index, 1);
    }

    public function setOldCoverImage($photoId, $productId)
    {
       $this->repository->setOldCoverImage($photoId, $productId);
        $this->dispatch('success', 'کاور تغییر کرد');
    }

    public function removeOldPhoto(ProductImage $photo,$productId)
    {
        $this->repository->removeOldPhoto($photo,$productId);
    }


    public function render()
    {
        return view('livewire.admin.product.createProduct.index')->layout('layouts.admin.app');
    }
}
