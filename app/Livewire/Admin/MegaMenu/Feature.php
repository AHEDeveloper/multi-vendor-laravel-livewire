<?php

namespace App\Livewire\Admin\MegaMenu;

use App\Models\CategoryFeature;
use App\Models\MegaMenuCategory;
use App\Models\MegaMenuFeature;
use App\Repository\admin\MegaMenu\MegaMenuAdminRepositoryInterface;
use App\Services\admin\validation\ServiceMegaMenu;
use Livewire\Component;
use Livewire\WithPagination;

class Feature extends Component
{
    use WithPagination;

    public $name, $featureId;
    public $menuCategory;
    private $repository;

    public function boot(MegaMenuAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount(MegaMenuCategory $category)
    {
        $this->menuCategory = $category;
    }

    public function submit($formData, ServiceMegaMenu $service)
    {
        $service->featureValidation($formData, $this->featureId)->validate();
        $this->repository->submitMegaMenuFeature($formData, $this->featureId, $this->menuCategory);
        $this->reset('name');
        $this->resetValidation();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد');
        $this->featureId = null;

    }

    public function edit($feature_id)
    {
        $feature = $this->repository->findFeature($feature_id);
        if ($feature) {
            $this->featureId = $feature->id;
            $this->name = $feature->name;
        }
    }

    public function delete($feature_id)
    {
        $feature = $this->repository->findFeature($feature_id);
        if ($feature) {
            $feature->delete();
        }
        $this->dispatch('success', 'حذف شما با موفقیت انجام شد');
    }

    public function render()
    {
        $features = MegaMenuFeature::query()
            ->where('mega_menu_category_id', $this->menuCategory->id)
            ->paginate(10);
        return view('livewire.admin.mega-menu.folderFeature.index', [
            'features' => $features
        ])->layout('layouts.admin.app');
    }
}
