<?php

namespace App\Livewire\Admin\Order;

use Livewire\Component;

class Detail extends Component
{
    public function render()
    {
        return view('livewire.admin.order.detail')->layout('layouts.admin.app');
    }
}
