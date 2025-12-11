<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\CategoryFeature;
use App\Repository\admin\Categorys\CategoryAdminRepositoryInterface;
use App\Services\admin\validation\ServiceCategory;

use Livewire\Component;
use Livewire\WithPagination;

class Feature extends Component
{
    use WithPagination;

    public $nameCategory;
    public $category;
    public $name;
    public $featureId;
    private $repository;
    public function boot(CategoryAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function mount(Category $category)
    {
        $this->nameCategory = $category->name;
    }

    public function submit($formData,ServiceCategory $serviceFeature)
    {
        $categoryId = $this->category->id;
        $serviceFeature->featureValidation($formData,$this->featureId)->validate();
        $this->repository->submitFeature($formData,$categoryId,$this->featureId);
        $this->reset('name');
        $this->resetValidation();
        $this->dispatch('success','عملیات با موفقیت انجام شد');
        $this->featureId = null;
    }

    public function edit($feature_id)
    {
        $feature = $this->repository->firstFeatureMethod($feature_id);
        if ($feature)
        {
            $this->featureId = $feature->id;
            $this->name = $feature->name;
        }
    }

    public function delete($feature_id)
    {
        $feature = $this->repository->firstFeatureMethod($feature_id);
        if ($feature)
        {
         $feature->delete();
        }
        $this->dispatch('success','عملیات حذف با موفقیت انجام شد');
    }

    public function render()
    {
        $features = CategoryFeature::query()->paginate(10);
        return view('livewire.admin.category.createFeature.index',[
            'features' => $features
        ])->layout('layouts.admin.app');
    }
}
