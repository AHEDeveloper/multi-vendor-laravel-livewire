<?php

namespace App\Repository\admin\Categorys;

use App\Models\Category;
use App\Models\CategoryFeature;
use App\Models\CategoryFeatureDetail;
use App\Models\CategoryFeatureDetailValue;
use App\Models\CategoryImage;
use App\Services\admin\resizeImage\ServiceImageCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoryAdminRepository implements CategoryAdminRepositoryInterface
{
    public function submit($formData, $categoryId, $photo)
    {
        DB::transaction(function () use ($formData, $categoryId, $photo) {
            $category = $this->submitCategory($formData, $categoryId);
            $this->saveImage($photo, $category->id);
            $this->webFormatImageCategory($photo, $category->id);
        });
    }

    public function submitCategory($formData, $categoryId)
    {
        return Category::query()->updateOrCreate(
            [
                'id' => $categoryId
            ],
            [
                'name' => $formData['name'],
                'category_id' => $formData['parent']
            ]
        );
    }

    public function saveImage($photo, $categoryId)
    {
        if ($photo) {
            $path = pathinfo($photo->hashName(), PATHINFO_FILENAME) . '.webp';
            CategoryImage::query()->create([
                'path' => $path,
                'category_id' => $categoryId
            ]);
        }
    }

    public function webFormatImageCategory($photo, $categoryId)
    {
        if ($photo) {
            $serviceImageCategory = new ServiceImageCategory();
            $serviceImageCategory->resizeImage($photo, $categoryId, 100, 100, 'small');
            $serviceImageCategory->resizeImage($photo, $categoryId, 400, 400, 'medium');
            $serviceImageCategory->resizeImage($photo, $categoryId, 800, 800, 'large');
        }
    }

    public function fineCategory($category_id)
    {
         return Category::query()
            ->with('image')
            ->where('id', $category_id)->first();
    }

    public function methodDeleteForEdit($categoryId)
    {
        $category = Category::query()->where('id',$categoryId)
            ->with('image')
            ->first();
        CategoryImage::query()->where('category_id', $category->id)->delete();
        \Illuminate\Support\Facades\File::delete(public_path('categorys/' . $category->id . '/' . 'small/' . $category->image->path));
        \Illuminate\Support\Facades\File::delete(public_path('categorys/' . $category->id . '/' . 'medium/' . $category->image->path));
        \Illuminate\Support\Facades\File::delete(public_path('categorys/' . $category->id . '/' . 'large/' . $category->image->path));
    }

    public function deleteCategory($category)
    {
        CategoryImage::query()->where('category_id',$category->id)->delete();
        File::deleteDirectory(public_path('categorys/' . $category->id));
        $category->delete();
    }
    //CategoryFeature
    public function submitFeature($formData,$categoryId,$featureId)
    {
        CategoryFeature::query()->updateOrCreate(
            [
                'id' => $featureId
            ],
            [
                'name' => $formData['name'],
                'category_id' => $categoryId
            ]
        );
    }

    public function firstFeatureMethod($feature_id)
    {
       return CategoryFeature::query()->where('id',$feature_id)->first();
    }
    //CategoryFeatureDetail
    public function submitDetail($formData,$featureId,$detailId)
    {
        CategoryFeatureDetail::query()->updateOrCreate(
            [
                'id' => $detailId
            ],
            [
                'name' => $formData['name'],
                'category_feature_id' => $featureId
            ]
        );
    }

    public function firstDetailMethod($detail_id)
    {
       return  CategoryFeatureDetail::query()->where('id',$detail_id)->first();
    }

    //CategoryFeatureDetailValue
    public function submitValue($formData,$detailId,$valueId)
    {
        CategoryFeatureDetailValue::query()->updateOrCreate(
            [
                'id' => $valueId
            ],
            [
                'value' => $formData['value'],
                'category_feature_detail_id' => $detailId
            ]
        );
    }

    public function firstValueMethod($value_id)
    {
        return CategoryFeatureDetailValue::query()->where('id',$value_id)->first();
    }

}
