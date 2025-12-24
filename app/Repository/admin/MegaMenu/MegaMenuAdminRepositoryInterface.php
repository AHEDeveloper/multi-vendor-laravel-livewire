<?php

namespace App\Repository\admin\MegaMenu;

interface MegaMenuAdminRepositoryInterface
{
    public function submit($formData, $megaCategoryId, $photo);

    public function submitMegaCategory($formData, $megaCategoryId);

    public function submitMegaImage($photo, $menuId);

    public function saveResizeImage($photo, $menuId);

    public function findMegaMenuCategory($menu_id);

    public function deleteMegaMenuImage($megaCategoryId);

    public function deleteMegaMenu($menu, $menu_id);

    public function submitMegaMenuFeature($formData, $featureId, $megaCategory);

    public function findFeature($feature_id);

    public function submitMegaMenuValue($formData,$valueId,$featureId);
    public function fineValue($value_id);

}

