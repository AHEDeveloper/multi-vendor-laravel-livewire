<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Category::class,'id','category_id');
    }

    public function image()
    {
        return $this->belongsTo(CategoryImage::class,'id','category_id');
    }
}
