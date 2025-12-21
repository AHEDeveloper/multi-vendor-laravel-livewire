<?php

namespace App\Livewire\Admin\Product;

use App\Trait\UploadeFile;
use Illuminate\Http\Request;
use Livewire\Component;

class CKeditor extends Component
{
use UploadeFile;

    public function upload($productId,Request $request)
    {
        if ($request->hasFile('upload'))
        {
            $file = $request->file('upload');
            $this->uploadImageInWebFormat($file,$productId,null,null,'content');

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('products/'.$productId.'/content/'.pathinfo($file->hashName(), PATHINFO_FILENAME) . '.webp');
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

}
