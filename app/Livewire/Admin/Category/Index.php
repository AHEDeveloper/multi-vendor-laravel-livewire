<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\CategoryImage;
use App\Repository\admin\Categorys\CategoryAdminRepositoryInterface;
use App\Services\admin\resizeImage\ServiceImageCategory;
use App\Services\admin\validation\ServiceCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithPagination, WithFileUploads;

    public $categories = [];

    public $categoryId;
    public $name;
    public $parent;
    public $photo;
    public $categoryEdit;
    private $repository;

    public function boot(CategoryAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount()
    {
        $this->categories = Category::query()->select('id', 'name')->get();
    }

    public function submit($formData, ServiceCategory $service)
    {
        if ($formData['parent'] == "") {
            $formData['parent'] = null;
        }
        $formData['photo'] = $this->photo;
        $service->categoryValidation($formData,$this->categoryId)->validate();
        $this->categoryEdit($this->categoryId);
        $this->repository->submit($formData, $this->categoryId, $this->photo);
        $this->dispatch('success', 'عملیات با موفقیت انجام شد');
        $this->reset('name', 'parent', 'photo');
        $this->resetValidation();
        $this->categoryId = null;
        $this->categoryEdit = null;

    }

    public function categoryEdit($categoryId)
    {
        if ($categoryId && $this->photo)
        {
            $this->repository->methodDeleteForEdit($categoryId);
        }
    }

    public function edit($category_id)
    {
        $this->categoryEdit = $category = $this->repository->edit($category_id);
        if ($category) {
            $this->categoryId = $category->id;
            $this->name = $category->name;
            $this->parent = $category->category_id;
        }
    }

    public function delete($category_id)
    {
        $this->repository->deleteCategory($category_id);
        $this->dispatch('success','عملیات حذف انجام شد');
    }

    public function render()
    {
        $categorys = Category::query()
            ->with('parent', 'image')
            ->latest()
            ->paginate(10);
//        dd($categorys);
        return view('livewire.admin.category.createCategory.index', [
            'categorys' => $categorys
        ])->layout('layouts.admin.app');
    }
}
