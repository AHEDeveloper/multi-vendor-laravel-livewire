<?php

namespace App\Livewire\Admin\MegaMenu;

use App\Models\MegaMenuCategory;
use App\Models\MegaMenuImage;
use App\Repository\admin\MegaMenu\MegaMenuAdminRepositoryInterface;
use App\Services\admin\validation\ServiceMegaMenu;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination,WithFileUploads;
    public $megaCategoryId,$name;
    public $photo,$menu;
    private $repository;

    public function boot(MegaMenuAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function submit($formData,ServiceMegaMenu $service)
    {
        $service->categoryValidation($formData,$this->megaCategoryId,$this->photo)->validate();
        $this->removeOldMegaMenuImage();
        $this->repository->submit($formData,$this->megaCategoryId,$this->photo);
        $this->reset('name','photo');
        $this->resetValidation();
        $this->dispatch('success','عملیات با موفقیت انجام شد');
        $this->megaCategoryId = null;
        $this->menu = null;
    }

    public function removeOldMegaMenuImage()
    {
        if ($this->megaCategoryId && $this->photo)
        {
          $this->repository->deleteMegaMenuImage();
        }
    }

    public function edit($menu_id)
    {
        $this->menu = $menu = $this->repository->fineMegaMenuCategory($menu_id);
        if ($menu)
        {
            $this->megaCategoryId = $menu->id;
            $this->name = $menu->name;
        }
    }

    public function delete($menu_id)
    {
        $menu = $this->repository->findMegaMenuCategory($menu_id);
        if ($menu)
        {
            $menu = $this->repository->deleteMegaMenu($menu,$menu_id);
        }
        $this->dispatch('success','عملیات حذف انجام شد');

    }

    public function render()
    {
        $menus = MegaMenuCategory::query()
            ->with('image')
            ->paginate(10);

        return view('livewire.admin.mega-menu.folderCategory.index',[
            'menus' => $menus
        ])->layout('layouts.admin.app');
    }
}
