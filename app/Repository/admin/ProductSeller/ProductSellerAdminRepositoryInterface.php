<?php

namespace App\Repository\admin\ProductSeller;

interface ProductSellerAdminRepositoryInterface
{
    public function submit($formData,$productSellerId);
    public function collectionProducts($search);
    public function collectionSellers($search);

}
