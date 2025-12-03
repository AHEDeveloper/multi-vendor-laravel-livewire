<?php

namespace App\Livewire\Admin\Category;

use App\Models\CategoryFeatureDetail;
use Livewire\Component;

class Detail extends Component
{
    public function render()
    {
        $details = CategoryFeatureDetail::query()->paginate(10);
        return view('livewire.admin.category.detail',[
            'details' => $details
        ])->layout('layouts.admin.app');
    }
}
