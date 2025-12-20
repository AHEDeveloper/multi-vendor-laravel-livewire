<?php

namespace App\Repository\admin\Product;

interface ProductAdminRepositoryInterface
{
    public function submit($formData,$productId,$photos,$coverImage);
    public function submitProduct($formData,$productId);
    public function generateCode();
    public function submitSeoItem($formData,$product);
    public function submitProductSeller($formData,$product);
    public function submitProductImage($photos,$product,$coverImage);
    public function resize($photos,$product);
    public function deleteProduct($product_id);
    public function submitProductFeature($formData,$productId);



}
