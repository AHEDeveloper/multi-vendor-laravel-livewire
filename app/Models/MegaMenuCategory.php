<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MegaMenuCategory extends Model
{
    //
    protected $guarded = [];

    public function image()
    {
        return $this->belongsTo(MegaMenuImage::class,'id','mega_menu_category_id');
    }

}
