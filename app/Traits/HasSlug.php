<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug{


    public static function BootHasSlug() {
        static::creating(function(Model $model) {
            $model->slug = Str::slug($model->name);
        });
    }

}