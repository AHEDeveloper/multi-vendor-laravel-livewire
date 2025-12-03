<?php

namespace App\Livewire\Admin\MegaMenu;

use App\Models\MegaMenuValue;
use Livewire\Component;
use Livewire\WithPagination;

class Value extends Component
{
    use WithPagination;
    public function render()
    {
        $values = MegaMenuValue::query()->paginate(10);
        return view('livewire.admin.mega-menu.value',[
            'values' => $values
        ])->layout('layouts.admin.app');
    }
}
