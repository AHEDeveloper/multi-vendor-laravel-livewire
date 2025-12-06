<?php

namespace App\Livewire\Admin\Weblog;

use App\Models\blogCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    public function render()
    {
        $categorys = blogCategory::query()->paginate(10);
        return view('livewire.admin.weblog.createCategory.index',[
            'categorys' => $categorys
        ])->layout('layouts.admin.app');
    }
}
