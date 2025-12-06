<?php

namespace App\Livewire\Admin\Coupon;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.coupon.index')->layout('layouts.admin.app');
    }
}
