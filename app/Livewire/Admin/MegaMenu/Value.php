<?php

namespace App\Livewire\Admin\MegaMenu;

use App\Models\MegaMenuFeature;
use App\Models\MegaMenuValue;
use App\Repository\admin\MegaMenu\MegaMenuAdminRepositoryInterface;
use App\Services\admin\validation\ServiceMegaMenu;
use Livewire\Component;
use Livewire\WithPagination;

class Value extends Component
{
    use WithPagination;
    public $value,$valueId,$feature;
    private $repository;

    public function boot(MegaMenuAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function mount(MegaMenuFeature $feature)
    {
        $this->feature = $feature;
    }

    public function submit($formData,ServiceMegaMenu $service)
    {
        $service->valueValidation($formData, $this->valueId)->validate();
        $this->repository->submitMegaMenuValue($formData,$this->valueId,$this->feature->id);
        $this->reset('value');
        $this->resetValidation();
        if ($this->valueId) {$this->dispatch('success', 'عملیات ادیت با موفقیت انجام شد');} else {$this->dispatch('success','عملیات با موفقیت انجام شد');}
        $this->valueId= null;
    }

    public function edit($value_id)
    {
        $value = $this->repository->fineValue($value_id);
        if ($value)
        {
            $this->valueId = $value->id;
            $this->value = $value->value;
        }
    }

    public function delete($value_id)
    {
        $value = $this->repository->fineValue($value_id);
        if ($value)
        {
            $value->delete();
        }
        $this->dispatch('success','حذف با موفقیت انجام شد');
    }

    public function render()
    {
        $values = MegaMenuValue::query()->paginate(10);
        return view('livewire.admin.mega-menu.folderValue.index',[
            'values' => $values
        ])->layout('layouts.admin.app');
    }
}
