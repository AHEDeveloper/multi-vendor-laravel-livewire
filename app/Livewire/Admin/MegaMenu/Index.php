<?php

namespace App\Livewire\Admin\MegaMenu;

use App\Models\MegaMenuCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $menus = MegaMenuCategory::query()->paginate(10);
        return view('livewire.admin.mega-menu.folderCategory.index',[
            'menus' => $menus
        ])->layout('layouts.admin.app');
    }
}
