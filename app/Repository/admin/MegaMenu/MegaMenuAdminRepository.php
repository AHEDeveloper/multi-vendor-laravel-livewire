<?php

namespace App\Repository\admin\MegaMenu;

use App\Models\MegaMenuCategory;
use App\Models\MegaMenuFeature;
use App\Models\MegaMenuImage;
use App\Models\MegaMenuValue;
use App\Services\admin\resizeImage\ServiceImageMegaMenu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MegaMenuAdminRepository implements MegaMenuAdminRepositoryInterface
{

    public function submit($formData,$megaCategoryId,$photo)
    {
        DB::transaction(function () use ($formData,$megaCategoryId,$photo){
            $menu = $this->submitMegaCategory($formData,$megaCategoryId);
            $this->submitMegaImage($photo,$menu->id);
            $this->saveResizeImage($photo,$menu->id);
        });
    }

    public function submitMegaCategory($formData,$megaCategoryId)
    {
        return MegaMenuCategory::query()->updateOrCreate(
            [
                'id' => $megaCategoryId
            ],
            [
                'name' => $formData['name']
            ]
        );
    }

    public function submitMegaImage($photo,$menuId)
    {
        $path = pathinfo($photo->hashName(),PATHINFO_FILENAME). '.webp';
        MegaMenuImage::query()->create([
            'path' =>  $path,
            'mega_menu_category_id' => $menuId
        ]);
    }

    public function saveResizeImage($photo,$menuId)
    {
        $servicImage = new ServiceImageMegaMenu();
        $servicImage->resize($photo,$menuId,100,100,'small');
        $servicImage->resize($photo,$menuId,400,400,'medium');
        $servicImage->resize($photo,$menuId,100,100,'large');
        $photo->delete();
    }

    public function findMegaMenuCategory($menu_id)
    {
        return MegaMenuCategory::query()
            ->with('image')
            ->where('id',$menu_id)->first();
    }

    public function deleteMegaMenuImage($megaCategoryId)
    {
        $menu =  $this->findMegaMenuCategory($megaCategoryId);
        MegaMenuImage::query()->where('mega_menu_category_id',$megaCategoryId)->delete();
        File::delete(public_path('/menus/' . $menu->id . '/' . 'small/' . $menu->image->path));
        File::delete(public_path('/menus/' . $menu->id . '/' . 'medium/' . $menu->image->path));
        File::delete(public_path('/menus/' . $menu->id . '/' . 'large/' . $menu->image->path));
    }

    public function deleteMegaMenu($menu,$menu_id)
    {
        MegaMenuImage::query()->where('mega_menu_category_id',$menu_id)->delete();
        File::deleteDirectory(public_path('/menus/' . $menu->id));
        $menu->delete();
    }

    public function submitMegaMenuFeature($formData,$featureId,$megaCategory)
    {
        MegaMenuFeature::query()->updateOrCreate(
            [
                'id' => $featureId
            ],
            [
                'name' => $formData['name'],
                'mega_menu_category_id' => $megaCategory->id
            ]
        );
    }

    public function findFeature($feature_id)
    {
        return MegaMenuFeature::query()->where('id', $feature_id)->first();
    }

    public function submitMegaMenuValue($formData,$valueId,$featureId)
    {
        MegaMenuValue::query()->updateOrCreate(
            [
                'id' => $valueId
            ],
            [
                'name' => $formData['value'],
                'value' => $formData['value'],
                'mega_menu_feature_id' => $featureId
            ]
        );
    }

    public function fineValue($value_id)
    {
        return MegaMenuValue::query()->where('id',$value_id)->first();
    }

}
