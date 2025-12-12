<?php

namespace App\Repository\admin\Seller;

use App\Models\Seller;
use Illuminate\Support\Facades\Hash;

class SellerAdminRepository implements SellerAdminRepositoryInterface
{
    public function submitSeller($formData, $sellerId)
    {
        Seller::query()->updateOrCreate(
            [
                'id' => $sellerId
            ],
            [
                'name' => $formData['name'],
                'shop_name' => $formData['shop_name'],
                'mobile' => $formData['mobile'],
                'email' => $formData['email'],
                'password' => Hash::make($formData['password']),
                'address' => $formData['address'],
                'description' => $formData['description'],
            ]
        );
    }

    public function firstSellerMethod($seller_id)
    {
        return Seller::query()->where('id', $seller_id)->first();
    }

    public function renderMethod($search, $result)
    {
        return Seller::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate($result);
    }
}
