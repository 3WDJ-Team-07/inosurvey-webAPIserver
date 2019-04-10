<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileUploadController extends Controller
{
    public function fileUpload($file,$folder,$fileName){
        $file->storeAs(
            $folder,
            $fileName,
            's3'
        );
    }
}
