<?php

namespace App\Livewire\Admin\MegaMenu;

use App\Models\CategoryFeature;
use Livewire\Component;
use Livewire\WithPagination;

class Feature extends Component
{
    use WithPagination;
    public function render()
    {
        $features = CategoryFeature::query()->paginate(10);
        return view('livewire.admin.mega-menu.feature',[
            'features' => $features
        ])->layout('layouts.admin.app');
    }
}
