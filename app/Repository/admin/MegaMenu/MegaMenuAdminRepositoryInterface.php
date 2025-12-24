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
}

