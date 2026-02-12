<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSeller;
use App\Models\SeoItem;

use App\Repository\admin\Product\ProductAdminRepositoryInterface;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $result = 7,$search;

    public function deleteProduct($product_id,ProductAdminRepositoryInterface $repository)
    {
        $repository->deleteProduct($product_id);
        $this->dispatch('success','عملیات حذف با موفقیت انجام شد');
    }

    public function render()
    {
        $products = Product::query()
            ->with(['coverImage','category','productSeller'])
            ->when($this->search,function ($query){
                $query->where('name','like','%'.$this->search.'%');
            })
            ->paginate($this->result);
        return view('livewire.admin.product.index',[
            'products' => $products
        ])->layout('layouts.admin.app');
    }
}
