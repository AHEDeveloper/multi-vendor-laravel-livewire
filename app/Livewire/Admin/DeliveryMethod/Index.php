<?php

namespace App\Livewire\Admin\DeliveryMethod;

use App\Models\DeliveryMethod;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $deliverys = DeliveryMethod::query()->paginate(10);
        return view('livewire.admin.delivery-method.index',[
            'deliverys' => $deliverys
        ])->layout('layouts.admin.app');
    }
}
