<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasSerialNumber{


    public static function BootHasSerialNumber() {
        static::creating(function(Model $model) {
            $model->order_number = rand(100000, 999999);
        });
    }

}