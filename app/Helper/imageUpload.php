<?php

namespace App\Helper;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
// use Illuminate\Support\Str;


class ImageUpload
{
    static function singleUpload($name, $directory, $file)
    {
        $rand = $name;
        $dir = 'image/' . $directory . '/' . $rand;
        $dirLarge = $dir . '/large';
        if (empty($file)) {
            if (!File::exists($dir)) {
            }

            if (!File::exists($dirLarge)) {
                File::makeDirectory($dirLarge, 0755, True);
            }
            $filename = rand(1, 90000) . '.' . $file->getClientOriginalExtension();
            $path = public_path($dir . '/' . $filename);
            $path2 = public_path($dirLarge . '/' . $filename);

            Image::make($file->getRealPath())->save($path2);
            Image::make($file->getRealPath())->resize(250, 250)->save($path);
        } else {
            
        }
    }
}
