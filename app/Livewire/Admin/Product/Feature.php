<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\CategoryFeature;
use App\Models\CategoryFeatureDetail;
use App\Models\Product;
use App\Models\ProductFeatureDetailValue;
use App\Repository\admin\Product\ProductAdminRepositoryInterface;
use App\Services\admin\validation\ServiceProduct;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Feature extends Component
{
    public $features = [];
    public $productId;


    private $repository;

    public function boot(ProductAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount(Product $product)
    {
        $this->productId = $product->id;
        $categoryId = $product->category_id;
        $this->features = CategoryFeature::where('category_id', $categoryId)->get();
    }

    public function submit($formData)
    {
        $featureIds = [];
        $detailIds = [];
        $valueIds = [];
        foreach ($formData as $value)
        {
            list($featureId,$detailId,$valueId) = explode('_',$value);
            $featureIds[] = $featureId;
            $detailIds[] = $detailId;
            $valueIds[] = $valueId;
        }
        $data = [
            'featureIds' => $featureIds,
            'detailIds' => $detailIds,
            'valueIds' => $valueIds,
        ];
        $service = new ServiceProduct();
        $service->featureValidation($data)->validate();
        $this->repository->submitProductFeature($formData,$this->productId);

    }

    public function render()
    {
        return view('livewire.admin.product.feature')->layout('layouts.admin.app');
    }
}
