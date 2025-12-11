<?php

namespace App\Livewire\Admin\Category;

use App\Models\CategoryFeatureDetail;
use App\Models\CategoryFeatureDetailValue;
use App\Repository\admin\Categorys\CategoryAdminRepositoryInterface;
use App\Services\admin\validation\ServiceCategory;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Value extends Component
{
    use WithPagination;
    public $nameDetail;
    public $detail;
    public $valueId;
    public $value;
    private $repository;
    public function boot(CategoryAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount(CategoryFeatureDetail $detail)
    {
        $this->nameDetail = $detail->name;
        $this->detail = $detail;
    }

    public function submit($formData,ServiceCategory $service)
    {
        $detailId = $this->detail->id;
       $service->valueValidation($formData)->validate();
        $this->repository->submitValue($formData,$detailId,$this->valueId);
       $this->reset('value');
       $this->resetValidation();
       $this->dispatch('success','عملیات با موفقیت انجام شد');
       $this->valueId = null;
    }

    public function edit($value_id)
    {
        $value = $this->repository->firstValueMethod($value_id);
        if ($value)
        {
            $this->valueId = $value->id;
            $this->value = $value->value;
        }
    }
    public function delete($value_id)
    {
        $value = $this->repository->firstValueMethod($value_id);
        if ($value)
        {
            $value->delete();
        }
        $this->dispatch('success','عملیات حذف با موفقیت انجام شد');
    }

    public function render()
    {
        $values = CategoryFeatureDetailValue::query()
            ->where('category_feature_detail_id',$this->detail->id)
            ->paginate(10);
        return view('livewire.admin.category.createValue.index',[
            'values' => $values
        ])->layout('layouts.admin.app');
    }
}
