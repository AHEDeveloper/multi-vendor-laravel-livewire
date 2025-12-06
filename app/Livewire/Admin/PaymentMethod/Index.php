<?php

namespace App\Livewire\Admin\PaymentMethod;

use App\Models\Payment;
use App\Models\PaymentMethod;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $payments = PaymentMethod::query()->paginate(10);
        return view('livewire.admin.payment-method.index',[
            'payments' => $payments
        ])->layout('layouts.admin.app');
    }
}
