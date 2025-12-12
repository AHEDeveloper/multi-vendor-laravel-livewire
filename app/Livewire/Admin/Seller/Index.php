<?php

namespace App\Livewire\Admin\Seller;

use App\Models\Seller;
use App\Repository\admin\Seller\SellerAdminRepositoryInterface;
use App\Services\admin\validation\ServiceSeller;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $sellerId, $name, $shop_name, $mobile, $email, $password, $address, $description,$result = 1,$search;
    private $repository;
    public function boot(SellerAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function submit($formData)
    {
        $service = new ServiceSeller();
        $service->sellerValidation($formData)->validate();
        $this->repository->submitSeller($formData,$this->sellerId);
        $this->reset('name', 'shop_name', 'mobile', 'email', 'password', 'address', 'description');
        $this->resetValidation();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد');
        $this->sellerId = null;
    }

    public function edit($seller_id)
    {
        $this->resetValidation();
        $seller = $this->repository->firstSellerMethod($seller_id);
        if ($seller) {
            $this->sellerId = $seller->id;
            $this->name = $seller->name;
            $this->shop_name = $seller->shop_name;
            $this->mobile = $seller->mobile;
            $this->email = $seller->email;
            $this->password = $seller->password;
            $this->address = $seller->address;
            $this->description = $seller->description;
        }
    }

    public function delete($seller_id)
    {
        $seller = $this->repository->firstSellerMethod($seller_id);
        if ($seller)
        {
            $seller->delete();
        }
    }

    public function resetModal()
    {
        $this->resetValidation();
        $this->reset('name', 'shop_name', 'mobile', 'email', 'password', 'address', 'description');
    }
    public function render()
    {
        $sellers = $this->repository->renderMethod($this->search,$this->result);
        return view('livewire.admin.seller.index', [
            'sellers' => $sellers
        ])->layout('layouts.admin.app');
    }
}
