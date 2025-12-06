<?php

namespace App\Livewire\Admin\Coupon;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.admin.coupon.create')->layout('layouts.admin.app');
    }
}
