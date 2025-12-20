<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryFeatureDetail extends Model
{
    //
    protected $guarded = [];

    public function featureDetailValue()
    {
        return $this->hasMany(CategoryFeatureDetailValue::class);
    }
}
