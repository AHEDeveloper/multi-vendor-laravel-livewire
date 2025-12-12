<?php

namespace App\Repository\admin\Seller;

interface SellerAdminRepositoryInterface
{
    public function submitSeller($formData,$sellerId);
    public function renderMethod($search, $result);

}
