<?php

namespace App\Repository\admin\Categorys;

interface CategoryAdminRepositoryInterface
{
    //Category
    public function submit($formData,$categoryId,$photo);
    public function submitCategory($formData,$categoryId);
    public function saveImage($photo,$categoryId);
    public function webFormatImageCategory($photo,$categoryId);
    public function edit($category_id);
    public function methodDeleteForEdit($categoryId);

    //CategoryFeature
    public function submitFeature($formData,$categoryId,$featureId);
    public function firstFeatureMethod($feature_id);




}
