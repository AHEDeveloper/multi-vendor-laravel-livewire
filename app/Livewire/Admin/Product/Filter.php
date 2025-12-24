<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\ProductFilter;
use App\Repository\admin\Product\ProductAdminRepositoryInterface;
use App\Services\admin\validation\ServiceProduct;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Filter extends Component
{
use WithPagination;

    public $value,$valueId,$product;
    private $repository;
    public function boot(ProductAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function submit($formData,ServiceProduct $service)
    {
       $service->filterValidation($formData)->validate();
        $this->repository->submitProductFilter($formData,$this->valueId,$this->product->id);
        $this->reset('value');
        $this->resetValidation();
        $this->dispatch('success','عملیات با موفقیت انجام شد');
        $this->valueId = null;
    }

    public function edit($filter_id)
    {
        $filter = $this->repository->findProductFilter($filter_id);
        if ($filter)
        {
            $this->valueId = $filter->id;
            $this->value = $filter->value;
        }
    }

    public function delete($filter_id)
    {
        $filter = $this->repository->findProductFilter($filter_id);
        if ($filter)
        {
            $filter->delete();
        }
        $this->dispatch('success','حذف با موفقیت انجام شد');
    }

    public function render()
    {
        $filters = ProductFilter::query()->paginate(10);
        return view('livewire.admin.product.createFilter.index',[
            'filters' => $filters
        ])->layout('layouts.admin.app');
    }
}
