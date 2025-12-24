<?php

namespace App\Repository\admin\Categorys;

interface CategoryAdminRepositoryInterface
{
    //Category
    public function submit($formData,$categoryId,$photo);
    public function submitCategory($formData,$categoryId);
    public function saveImage($photo,$categoryId);
    public function webFormatImageCategory($photo,$categoryId);
    public function fineCategory($category_id);
    public function methodDeleteForEdit($categoryId);
    public function deleteCategory($category);

    //CategoryFeature
    public function submitFeature($formData,$categoryId,$featureId);
    public function firstFeatureMethod($feature_id);

    //CategoryFeatureDetail
    public function submitDetail($formData,$featureId,$detailId);
    public function firstDetailMethod($detail_id);
    //CategoryFeatureDetailValue
    public function submitValue($formData,$detailId,$valueId);
    public function firstValueMethod($value_id);




}
