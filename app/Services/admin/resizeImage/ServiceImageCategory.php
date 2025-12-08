<?php

namespace App\Services\admin\resizeImage;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ServiceImageCategory
{
    public function resizeImage($photo,$categoryId,$with,$height,$folder)
    {
        $folderPath = public_path('categorys'.'/'.$categoryId.'/'.$folder);
        if (!file_exists($folderPath))
        {
            mkdir($folderPath,0755,true);
        }
        $manager = new ImageManager(new Driver());
        $manager->read($photo->getRealPath())
            ->scale($with,$height)
            ->towebp()
            ->save($folderPath.'/'.pathinfo($photo->hashName(),PATHINFO_FILENAME).'.webp');
    }
}
