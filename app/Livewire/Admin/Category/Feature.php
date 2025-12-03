<?php

namespace App\Livewire\Admin\Category;

use App\Models\CategoryFeature;
use Livewire\Component;
use Livewire\WithPagination;

class Feature extends Component
{
    use WithPagination;
    public function render()
    {
        $features = CategoryFeature::query()->paginate(10);
        return view('livewire.admin.category.createFeature.index',[
            'features' => $features
        ])->layout('layouts.admin.app');
    }
}
