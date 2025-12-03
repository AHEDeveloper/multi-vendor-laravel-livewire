<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $categorys = Category::query()->paginate(10);
        return view('livewire.admin.category.createCategory.index',[
            'categorys' => $categorys
        ])->layout('layouts.admin.app');
    }
}
