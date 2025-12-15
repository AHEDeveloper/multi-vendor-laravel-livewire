<?php

namespace App\Repository\admin\Product;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSeller;
use App\Models\SeoItem;
use App\Trait\UploadeFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProductAdminRepository implements ProductAdminRepositoryInterface
{
    use UploadeFile;

    public function submit($formData,$productId,$photos,$coverImage)
    {
        DB::transaction(function () use ($formData,$productId,$photos,$coverImage){
            $product = $this->submitProduct($formData,$productId);
            $this->submitSeoItem($formData,$product);
            $this->submitProductSeller($formData,$product);
            $this->submitProductImage($photos,$product,$coverImage);
            $this->resize($photos,$product);
        });
    }

    public function submitProduct($formData,$productId)
    {
        return Product::query()->updateOrCreate(
            [
                'id' => $productId
            ],
            [
                'name' => $formData['name'],
                'category_id' => $formData['category'],
                'p_code' => 'dkp-'.$this->generateCode(),
            ]
        );
    }

    public function generateCode()
    {
       do{
           $randomCode = rand(1000,1000000);
           $checkCode = Product::query()->where('p_code','=',$randomCode)->first();
       }while($checkCode);
       return $randomCode;
    }

    public function submitSeoItem($formData,$product)
    {
        SeoItem::query()->updateOrCreate(
            [
                'ref_id' => $product->id,
                'type' => 'product',
            ],
            [
                'slug' => $formData['slug'],
                'meta_title' => $formData['meta_title'],
                'meta_description' => $formData['meta_description']
            ]
        );
    }

    public function submitProductSeller($formData,$product)
    {
        ProductSeller::query()->updateOrCreate(
            [
                'product_id' => $product->id
            ],
            [
                'price' => $formData['price'],
                'stock' => $formData['stock'],
                'discount' => $formData['discount'],
                'featured' => $formData['featured'],
                'discount_duration' => $formData['discount_duration'],
                'seller_id' => $formData['seller'],
            ]
        );
    }

    public function submitProductImage($photos,$product,$coverImage)
    {
        foreach ($photos as $index=>$photo)
        {
            $path = pathinfo($photo->hashName(),PATHINFO_FILENAME) . '.webp';
            ProductImage::query()->create([
                'path' => $path,
                'is_cover' => $index==$coverImage,
                'product_id' => $product->id
            ]);
        }
    }

    public function resize($photos,$product)
    {
        foreach ($photos as $photo)
        {
            $this->uploadImageInWebFormat($photo,$product->id,100,100,'small');
            $this->uploadImageInWebFormat($photo,$product->id,400,400,'medium');
            $this->uploadImageInWebFormat($photo,$product->id,100,100,'large');
        }

    }

    public function getProductByCode($p_code)
    {
        return Product::query()->where('p_code', $p_code)
            ->with(['seoItem', 'productSeller', 'images'])
            ->first();
    }

    public function setOldCoverImage($photoId,$productId)
    {
        ProductImage::query()->where('product_id', $productId)->update(['is_cover' => false]);
        ProductImage::query()->where([
            'id' => $photoId,
            'product_id' => $productId,
        ])->update(['is_cover' => true]);
    }

    public function removeOldPhoto(ProductImage $photo,$productId)
    {
        File::delete(public_path('/products/'.$productId.'/'.'small/'.$photo->path));
        File::delete(public_path('/products/'.$productId.'/'.'medium/'.$photo->path));
        File::delete(public_path('/products/'.$productId.'/'.'large/'.$photo->path));
        $photo->delete();
    }

    public function deleteProduct($product_id)
    {
        $product = Product::query()->where('id',$product_id)->first();
        if ($product)
        {
            SeoItem::query()->where('ref_id',$product->id)->delete();
            ProductImage::query()->where('product_id',$product->id)->delete();
            ProductSeller::query()->where('product_id',$product->id)->delete();
            File::deleteDirectory(public_path('/products/' . $product->id));
            $product->delete();
        }
    }

}
