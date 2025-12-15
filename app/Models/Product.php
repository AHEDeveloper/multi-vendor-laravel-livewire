<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function coverImage()
    {
        return $this->belongsTo(ProductImage::class,'id','product_id')->where('is_cover','=',true);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productSeller()
    {
        return $this->belongsTo(ProductSeller::class,'id','product_id');
    }

    public function seoItem()
    {
        return $this->belongsTo(SeoItem::class,'id','ref_id');
    }

}
