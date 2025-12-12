<?php

namespace App\Livewire\Admin\Seller;

use App\Models\Seller;
use App\Services\admin\validation\ServiceSeller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Creat extends Component
{
    public $sellerId,$name,$shop_name,$mobile,$email,$password,$address,$description;

    public function render()
    {
        return view('livewire.admin.seller.creat');
    }
}
