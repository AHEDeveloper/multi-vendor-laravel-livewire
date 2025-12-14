<?php

namespace App\Trait;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait UploadeFile
{
    protected function uploadImageInWebFormat($photo, $productId, $with, $height, $folder)
    {
        $folderPath = public_path('products/' . $productId . '/' . $folder);
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true);
        }
        $image = new ImageManager(new Driver());
        $image->read($photo->getRealPath())
            ->scale($with, $height)
            ->toWebp()
            ->save($folderPath . '/' . pathinfo($photo->hashName(), PATHINFO_FILENAME) . '.webp');

    }
}
