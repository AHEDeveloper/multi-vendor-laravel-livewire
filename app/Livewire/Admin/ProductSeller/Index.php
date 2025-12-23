<?php

namespace App\Livewire\Admin\ProductSeller;

use App\Models\Product;
use App\Models\ProductSeller;
use App\Models\Seller;
use App\Repository\admin\ProductSeller\ProductSellerAdminRepositoryInterface;
use App\Services\admin\validation\ServiceProductSeller;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $productSellerId;
    public $product,$seller,$price,$stock,$discount,$discount_duration,$featured,$search,$searchSeller;
    private $repository;
    public function boot(ProductSellerAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
   }

    public function submit($formData,ServiceProductSeller $service)
    {
        if (isset($formData['featured'])){$formData['featured'] = true;}else{$formData['featured'] = false;}
        if ($formData['discount_duration'] == "") {$formData['discount_duration'] = null;}
        if ($formData['discount'] == "") {$formData['discount'] = null;}
        $formData['price'] = str_replace(',', '', $this->price);
        $service->productSellerValidation($formData)->validate();
        $this->repository->submit($formData,$this->productSellerId);
        $this->reset('product','seller','price','stock','discount','discount_duration','featured');
        $this->resetValidation();
        $this->dispatch('success','عملیات با موفقیت انجام شد');
        $this->productSellerId = null;

    }

    public function edit($productSeller_id)
    {
         $productSeller = $this->repository->findProductSeller($productSeller_id);
        if ($productSeller)
        {
            $this->productSellerId = $productSeller->id;
            $this->product = $productSeller->product_id;
            $this->seller = $productSeller->seller_id;
            $this->price = $productSeller->price;
            $this->stock = $productSeller->stock;
            $this->discount = $productSeller->discount;
            $this->discount_duration = \Carbon\Carbon::parse($productSeller->discount_duration)->format('Y-m-d');
            $this->featured = (bool) $productSeller->featured;
        }
    }

    public function delete($productSeller_id)
    {
        $this->productSeller = $productSeller = $this->repository->findProductSeller($productSeller_id);
        if ($productSeller)
        {
            $productSeller->delete();
            $this->dispatch('success','عملیات حذف انجام شد');
        }
    }


    public function render()
    {
        $products = $this->repository->collectionProducts($this->search);
        $sellers = $this->repository->collectionSellers($this->searchSeller);
        $productSellers = ProductSeller::query()
            ->with(['product','seller','product.coverImage'])
            ->paginate(10);

        return view('livewire.admin.product-seller.index',[
            'productSellers' => $productSellers,
            'products' => $products,
            'sellers' => $sellers,
        ])->layout('layouts.admin.app');
    }
}
