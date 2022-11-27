<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Trait UploadAble
 * @package App\Traits
 */
trait UploadAble
{
    /**
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @param null $filename
     * @return false|string
     */
    public function uploadOne(UploadedFile $file = null, $folder = null, $disk = 'public')
    {
        if ($file && ($file instanceof UploadedFile)) {

            $name = time() . "." . $file->getClientOriginalExtension();

            return $file->storeAs(
                $folder,
                $name,
                $disk
            );
        }
    }

    /**
     * @param null $path
     * @param string $disk
     */
    public function deleteOne($path = null, $disk = 'public')
    {
        if ($path) {
            Storage::disk($disk)->delete($path);
        }
    }
}
