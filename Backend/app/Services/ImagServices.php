<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImagServices{
    private static string $rootPath =  'public/Uploads/Images/';
    private static string $suffix =  '_IMG.';

    public static function save($media, $path): string
    {
        $name = time() . self::$suffix . $media->getClientOriginalExtension();
        Storage::putFileAs(self::$rootPath . $path, $media, $name);
        return self::$rootPath . "/$path/$name";
    }

    public static function update($media, ?string $old_path, string $new_path): string
    {
        if (isset($old_path))
            self::delete($old_path);

        return self::save($media, $new_path);
    }

    public static function delete($path): void
    {
        if (Storage::exists('public/'.$path))
            Storage::delete('public/'.$path);
    }
}
