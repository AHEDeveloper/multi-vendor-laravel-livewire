<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryFeature extends Model
{
    protected $guarded = [];

    public function categoryFeatureDetail()
    {
        return $this->hasMany(CategoryFeatureDetail::class);
    }
}
