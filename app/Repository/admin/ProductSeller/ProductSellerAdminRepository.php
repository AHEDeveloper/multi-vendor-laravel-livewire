<?php

namespace App\Repository\admin\ProductSeller;

use App\Models\Product;
use App\Models\ProductSeller;
use App\Models\Seller;

class ProductSellerAdminRepository implements ProductSellerAdminRepositoryInterface
{
    public function submit($formData,$productSellerId)
    {
        ProductSeller::query()->updateOrCreate(
            [
                'id' => $productSellerId
            ],
            [
                'price' => $formData['price'],
                'stock' => $formData['stock'],
                'discount' => $formData['discount'],
                'discount_duration' => $formData['discount_duration'],
                'featured' => $formData['featured'],
                'product_id' => $formData['product'],
                'seller_id' => $formData['seller']
            ]
        );
    }

    public function collectionProducts($search)
    {
        return Product::query()
            ->when($search,function ($query) use ($search) {
                $query->where('p_code','like','%'.$search.'%');
            })
            ->get();
    }

    public function collectionSellers($search)
    {
        return Seller::query()
            ->when($search,function ($query) use ($search){
                $query->where('shop_name','like','%'.$search.'%');
            })->get();
    }

    public function findProductSeller($productSeller_id)
    {
        return ProductSeller::query()->where('id',$productSeller_id)->first();
    }
}
