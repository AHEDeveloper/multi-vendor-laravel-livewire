<?php

namespace App\Services\admin\resizeImage;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ServiceImageMegaMenu
{
    public function resize($photo,$menuId,$with,$height,$folder)
    {
        $folderPath = public_path('/menus/' . $menuId .'/'. $folder);
        if (!file_exists($folderPath))
        {
            mkdir($folderPath,0755,true);
        }
        $manager = new ImageManager(new Driver());
        $manager->read($photo->getRealPath())
            ->scale($with,$height)
            ->toWebp()
            ->save($folderPath . '/' . pathinfo($photo->hashName(),PATHINFO_FILENAME). '.webp');
    }
}
