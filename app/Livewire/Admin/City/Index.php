<?php

namespace App\Livewire\Admin\City;

use App\Models\City;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $citys = City::query()->paginate(10);
        return view('livewire.admin.city.index',[
            'citys' => $citys
        ])->layout('layouts.admin.app');
    }
}
