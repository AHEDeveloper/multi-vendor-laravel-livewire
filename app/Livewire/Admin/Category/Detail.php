<?php

namespace App\Livewire\Admin\Category;

use App\Models\CategoryFeature;
use App\Models\CategoryFeatureDetail;
use App\Repository\admin\Categorys\CategoryAdminRepositoryInterface;
use App\Services\admin\validation\ServiceCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Detail extends Component
{
    public $nameFeature;
    public $detailId;
    public $name;
    public $feature;
    private $repository;

    public function boot(CategoryAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function mount(CategoryFeature $feature)
    {
        $this->nameFeature = $feature->name;
        $this->feature = $feature;
    }

    public function submit($formData,ServiceCategory $serviceDetail)
    {
        $featureId = $this->feature->id;
        $serviceDetail->detailValidation($formData,$this->detailId)->validate();
        $this->repository->submitDetail($formData,$featureId,$this->detailId);
        $this->reset('name');
        $this->resetValidation();
        $this->dispatch('success','عملیات با موفقیت انجام شد');
        $this->detailId = null;
    }

    public function edit($detail_id)
    {
        $detail = $this->repository->firstDetailMethod($detail_id);
        if ($detail)
        {
            $this->detailId = $detail->id;
            $this->name = $detail->name;
        }
    }

    public function delete($detail_id)
    {
        $detail = $this->repository->firstDetailMethod($detail_id);
        if ($detail)
        {
           $detail->delete();
        }
        $this->dispatch('success','عملیات حذف با موفقیت انجام شد');
    }

    public function render()
    {
        $details = CategoryFeatureDetail::query()->paginate(10);
        return view('livewire.admin.category.createDetail.index',[
            'details' => $details
        ])->layout('layouts.admin.app');
    }
}
