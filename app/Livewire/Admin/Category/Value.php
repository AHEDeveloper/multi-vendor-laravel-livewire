<?php

namespace App\Livewire\Admin\Category;

use App\Models\CategoryFeatureDetailValue;
use Livewire\Component;
use Livewire\WithPagination;

class Value extends Component
{
    use WithPagination;
    public function render()
    {
        $values = CategoryFeatureDetailValue::query()->paginate(10);
        return view('livewire.admin.category.value',[
            'values' => $values
        ])->layout('layouts.admin.app');
    }
}
